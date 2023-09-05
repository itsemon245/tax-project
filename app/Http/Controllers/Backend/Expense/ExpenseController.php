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
        $expenses = Expense::latest()->simplePaginate(paginateCount(20));
        return view('backend.expense.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $expenses = Expense::get('spend_on');
        return view('backend.expense.create', compact('expenses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'date|required',
            'spend_on' => 'string|required',
            'amount' => 'numeric|required',
            'description' => 'string|required',
        ]);
        $expense = Expense::create($request->all());
        $alert = [
            'alert-type' => 'success',
            'message' => 'Expense Created'
        ];
        return back()->with($alert);
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
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
        $expense->update($request->all());
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
