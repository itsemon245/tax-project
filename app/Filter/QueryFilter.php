<?php

namespace App\Filter;

use Illuminate\Http\Request;

class QueryFilter {
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

    public function transform(Request $request) {
        $eloQuery = [];
        foreach ($this->allowedParams as $param => $operators) {
            $query = $request->query($param);

            if (!isset($query)) {
                continue;
            }
            $column = $this->columnMap[$param];

            foreach ($operators as $operator) {
                if (str_contains($query, $operator)) {
                    $index = strpos($query, ']') + 1;
                    $value = substr($query, $index);
                    $eloQuery[] = ('like' === $operator || 'nl' === $operator) ?
                        [$column, $this->operatorMap[$operator], '%'.$value.'%']
                        : [$column, $this->operatorMap[$operator], $value];
                }
            }
        }

        return $eloQuery;
    }
}
