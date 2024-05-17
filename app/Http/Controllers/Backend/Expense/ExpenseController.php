<?php

namespace App\Http\Controllers\Backend\Expense;

use App\Models\Expense;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Expense::with('images')->latest();
        if(count(request()->all()) > 0) {
            foreach ($this->allowedQueries() as $key => $q) {
                if (request()->query($key)) {
                    if (Str::contains($key, ['credit'])) {
                        $query = $query->where(function (Builder $nq) use ($q) {
                            $nq->where($q[0]);
                            $nq->orWhere($q[1]);
                        });
                    } else {
                        $query = $query->where($q);
                    }
                }
            }
        }
        $expenses = $query->latest()->paginate(paginateCount());
        $merchants = Expense::select('merchant')->distinct()->latest()->get()->pluck('merchant');
        $categories = Expense::select('category')->distinct()->latest()->get()->pluck('category');
        $max = Expense::select('amount')->max('amount');
        $min = Expense::select('amount')->min('amount');
        return view('backend.expense.index', compact('expenses', 'categories', 'merchants', 'max', 'min'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $merchants = Expense::select('merchant')->distinct()->latest()->get()->pluck('merchant');
        $categories = Expense::select('category')->distinct()->latest()->get()->pluck('category');
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
            ...$request->except('amounts', 'descriptions', 'print'),
            'amount' => $amount,
            'balance' => $balance,
            'items' => $items
        ]);
        $alert = [
            'alert-type' => 'success',
            'message' => 'Expense Created'
        ];
        if ($request->has('print')) {
            return redirect(route('expense.show', $expense))->with('print', true);
        }
        return redirect(route('expense.show', $expense->id))->with($alert);
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        $merchants = Expense::select('merchant')->distinct()->latest()->get()->pluck('merchant');
        $categories = Expense::select('category')->distinct()->latest()->get()->pluck('category');
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
            ...$request->except('_method', '_token', 'print'),
        ]);
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

    protected function allowedQueries()
    {
        return [
            "date_from" => [['date', ">=", request()->query('date_from')]],
            "date_to" => [['date', "<=", request()->query('date_to')]],
            "merchant" => [['merchant', '=', request()->query('merchant')]],
            "category" => [['category', '=', request()->query('category')]],
            "credit_from" => [
                    [
                        ['type', "=", "credit"],
                        ['amount', ">=", request()->query('credit_from')],
                        ['type', "=", "credit"],
                        ['amount', "<=", request()->query('credit_to')],
                    ],
                    [
                        ['type', "=", "debit"],
                        ['amount', ">=", request()->query('debit_from')],
                        ['type', "=", "debit"],
                        ['amount', "<=", request()->query('debit_to')]
                    ]
            ]

        ];
    }
}
