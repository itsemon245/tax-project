<?php

namespace App\Http\Controllers\Backend\Client;

use Carbon\Carbon;
use App\Helper\CSV;
use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::orderBy('id', 'desc')->paginate(paginateCount(30));
        // dd($clients);
        return view('backend.client.view-client', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.client.create-client');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        $validated = $request->except('_token', 'method',);
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
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('backend.client.edit-client', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->except('method', 'token'));

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
    public function destroy(Client $client)
    {
        $client->delete();
        $notification = [
            'message' => 'Client Deleted',
            'alert-type' => 'success',
        ];
        return back()
            ->with($notification);
    }

    public function createFromCsv(Request $request)
    {
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
                    $day = strlen($dateItems[0]) === 1 ? (int) ('0' . $dateItems[0]) : (int) $dateItems[0];
                    $month = strlen($dateItems[1]) === 1 ? (int) ('0' . $dateItems[1]) : (int) $dateItems[1];
                    $year = (int) $dateItems[2];
                    $date = Carbon::createFromDate(
                        $year,
                        $month,
                        $day,
                        'Asia/Dhaka'
                    );
                    $DOB = $date->format('Y-m-d');
                    return $DOB;
                } elseif (strtolower($value) === 'n/a' || $value === '') {
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


    function getClient(Client $client) {
        return response()->json([
            'client' => $client
        ]);
    }
    public function downloadDemoExcel()
    {
        $filePath = public_path('client_list.csv');
        
        return Response::download($filePath, 'client-list-demo.csv');
    }
}
