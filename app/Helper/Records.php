<?php

use Illuminate\Support\Facades\DB;

class Records
{

    public function get($table = 'users', $queries = [], $limit = 10)
    {
        $records = DB::table($table)->where([$queries])->limit($limit)->get();
        return $records;
    }
}
