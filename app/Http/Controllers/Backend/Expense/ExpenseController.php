<?php

namespace App\Http\Controllers\Backend\Expense;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::with('images')->latest()->paginate(paginateCount());
        return view('backend.expense.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $merchants = Expense::select('merchant')->distinct()->get()->pluck('merchant');
        $categories = Expense::select('category')->distinct()->get()->pluck('category');
        return view('backend.expense.create', compact('merchants', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //    / dd($request->all());
        $validated = $request->validate([
            'date' => 'date',
            'category' => 'string',
            'footer_image' => 'required',
            'header_image' => 'required',
            'merchant' => 'string',
            'type' => 'string',
            'amounts' => 'array|required',
            'descriptions' => 'array',
        ]);
        $amounts = [];
        $descriptions = [];
        $items = [];
        foreach ($request->amounts as $key => $amount) {
            $amounts[] = (float) $amount;
            $descriptions[] = $request->descriptions[$key] ?? null;
            $items[] = [
                'amount' => (float) $amount,
                'description' => $request->descriptions[$key] ?? null
            ];
        }
        $amount = array_reduce($amounts, fn ($curr, $item) => $curr += $item, 0);
        $balance = $request->type === 'credit' ? $amount : $amount * (-1);
        $lastBalance = Expense::latest()->first('balance')->balance;
        $balance += $lastBalance;
        $expense = Expense::create([
            ...$request->except('amounts', 'descriptions', 'header_image', 'footer_image'),
            'amount' => $amount,
            'balance' => $balance,
            'items' => $items
        ]);
        $expense->saveImage($request->header_image);
        $expense->saveImage($request->footer_image);
        $alert = [
            'alert-type' => 'success',
            'message' => 'Expense Created'
        ];
        return redirect(route('expense.show', $expense->id))->with($alert);
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        $merchants = Expense::select('merchant')->distinct()->get()->pluck('merchant');
        $categories = Expense::select('category')->distinct()->get()->pluck('category');
        return view('backend.expense.create', compact('expense', 'merchants', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $expenses = Expense::get('spend_on');
        return view('backend.expense.edit', compact('expense', 'expenses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'date' => 'date|required',
            'spend_on' => 'string|required',
            'amount' => 'numeric|required',
            'description' => 'string|required',
        ]);
        // $expense->update($request->all());
        $expense->update([
            ...$request->except('_method', '_token', 'header_image', 'footer_image'),
        ]);
        if ($request->header_image) {
            $expense->updateImage($request->header_image, $expense->path);
        } else if ($request->footer_image) {
            $expense->updateImage($request->footer_image, $expense->path);
        }

        $alert = [
            'alert-type' => 'success',
            'message' => 'Expense Updated'
        ];
        return back()->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {

        $expense->delete();

        $alert = [
            'alert-type' => 'success',
            'message' => 'Expense Deleted'
        ];
        return back()->with($alert);
    }
}
