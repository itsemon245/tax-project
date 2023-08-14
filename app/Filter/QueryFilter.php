<?php

namespace App\Filter;

use Illuminate\Http\Request;

class QueryFilter
{
    protected $allowedParams = [];
    protected $columnMap = [];


    protected $operatorMap = [
        'eq' => '=',
        'ne' => '!=',
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
        'like' => 'LIKE',
        'nl' => 'NOT LIKE',
        'in' => 'IN',
    ];


    public function transform(Request $request)
    {
        $eloQuery = [];
        foreach ($this->allowedParams as $param => $operators) {
            $query = $request->query($param);

            if (!isset($query)) {
                continue;
            }

            $column = $this->columnMap[$param] ?? $param;

            foreach ($operators as  $operator) {
                $index = strpos($query, ']') + 1;
                $query = substr($query, $index);
                if (isset($query)) {
                    $eloQuery[] = ($operator === 'like' || $operator === 'nl') ?
                        [$column, $this->operatorMap[$operator], "%" . $query . "%"]
                        : [$column, $this->operatorMap[$operator], $query];
                }
            }
        }
        return $eloQuery;
    }
}
