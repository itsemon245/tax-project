<?php

namespace App\Filter;

use App\Filter\QueryFilter;
use Illuminate\Http\Request;


class InvoiceFilter extends QueryFilter
{
    protected $allowedParams = [
        'client' => ['eq'],
        'reference' => ['eq'],
        'status' => ['eq'],
        'fiscal_year' => ['eq'],
        'zone' => ['eq'],
        'circle' => ['eq'],
        'demand_price' => ['gte'],
        'paid_price' => ['gte'],
        'due_price' => ['gte'],
        'date' => ['gte'],
        'issue_date' => ['gte'],
        'due_date' => ['gte'],
        'demand_price_to' => ['lte'],
        'paid_price_to' => ['lte'],
        'due_price_to' => ['lte'],
        'issue_date_to' => ['lte'],
        'due_date_to' => ['lte'],
    ];
    protected $columnMap = [
        'client' => 'client_id',
        'reference' => 'reference_no',
        'status' => 'status',
        'fiscal_year' => 'year',
        'zone' => 'zone',
        'circle' => 'circle',
        'demand_price' => 'pivot_demand',
        'paid_price' => 'pivot_paid',
        'due_price' => 'pivot_due',
        'demand_price_to' => 'pivot_demand',
        'paid_price_to' => 'paid',
        'due_price_to' => 'pivot_due',
        'issue_date' => 'pivot_issue_date',
        'due_date' => 'pivot_due_date',
        'issue_date_to' => 'pivot_issue_date',
        'due_date_to' => 'pivot_due_date',
    ];
}
