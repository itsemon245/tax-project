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
        'demand' => ['gte', 'lte'],
        'paid' => ['gte', 'lte'],
        'arear' => ['gte', 'lte'],
        'date' => ['gte'],
        'issue_date' => ['gte'],
        'due_date' => ['gte'],
        'issue_date_to' => ['lte'],
        'due_date_to' => ['lte'],
    ];
    protected $columnMap = [
        'client' => 'client_id',
        'reference' => 'reference_no',
        'fiscal_year' => 'year',
        'zone' => 'zone',
        'circle' => 'circle',
        'status' => 'fiscal_year_invoice.status',
        'demand' => 'fiscal_year_invoice.demand',
        'paid' => 'fiscal_year_invoice.paid',
        'arear' => 'fiscal_year_invoice.due',
        'issue_date' => 'fiscal_year_invoice.issue_date',
        'due_date' => 'fiscal_year_invoice.due_date',
        'issue_date_to' => 'fiscal_year_invoice.issue_date',
        'due_date_to' => 'fiscal_year_invoice.due_date',
    ];
}
