<?php

namespace App\Http\Controllers\Backend\Client;

use App\Helper\CSV;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ClientRequest;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class ClientController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $clients = Client::orderBy('id', 'desc')->latest()->paginate(paginateCount(30));

        // dd($clients);
        return view('backend.client.view-client', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('backend.client.create-client');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request) {
        $validated = $request->validated();
        $client = Client::create($validated);
        $notification = [
            'message' => 'Client Created',
            'alert-type' => 'success',
        ];

        return back()
            ->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client) {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client) {
        return view('backend.client.edit-client', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request, Client $client) {
        $client->update($request->validated());

        $notification = [
            'message' => 'Client updated',
            'alert-type' => 'success',
        ];

        return back()
            ->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client) {
        $client->delete();
        $notification = [
            'message' => 'Client Deleted',
            'alert-type' => 'success',
        ];

        return back()
            ->with($notification);
    }

    public function createFromCsv(Request $request) {
        $csv = new CSV();
        $csv->path = $request->file('csv')->path();
        $data = $csv->parse();
        $headers = array_map(fn ($value) => Str::snake(strtolower($value)), $data['headers']);
        foreach ($data['rows'] as $row) {
            $mappedRow = array_map(function ($value) {
                $pattern = '/([1-9]|0[1-9]|[12][0-9]|3[01])\/([1-9]|0[1-9]|1[1,2])\/(19|20)\d{2}/i';
                $isDOB = preg_match($pattern, $value);
                if ($isDOB) {
                    $dateItems = explode('/', $value);
                    $day = 1 === strlen($dateItems[0]) ? (int) ('0'.$dateItems[0]) : (int) $dateItems[0];
                    $month = 1 === strlen($dateItems[1]) ? (int) ('0'.$dateItems[1]) : (int) $dateItems[1];
                    $year = (int) $dateItems[2];
                    $date = Carbon::createFromDate(
                        $year,
                        $month,
                        $day,
                        'Asia/Dhaka'
                    );
                    $DOB = $date->format('Y-m-d');

                    return $DOB;
                } elseif ('n/a' === strtolower($value) || '' === $value) {
                    return null;
                } else {
                    return $value;
                }
            }, $row);

            $item = array_combine($headers, $mappedRow);
            Client::create($item);
        }

        $notification = [
            'message' => 'CSV Imported',
            'alert-type' => 'success',
        ];

        return back()
            ->with($notification);
    }

    public function getClient(Client $client) {
        return response()->json([
            'client' => $client,
        ]);
    }

    public function downloadDemoExcel() {
        $filePath = public_path('client_list.csv');

        return Response::download($filePath, 'client-list-demo.csv');
    }
}
