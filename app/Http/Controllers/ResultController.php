<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreResultRequest;
use App\Http\Requests\UpdateResultRequest;
use App\Models\Question;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResultRequest $request)
    {
    dd($request->all());

        $id= Question::where('id',$request->question)->first();


        $result= new Result();
        $result->user_id = Auth::user()->id;
        $result->exam_id = $id->exam_id;
        foreach($request->answer as $answer){
            $Question= Question::where('name',$request->questionName)->first();
            $options = json_decode($Question->choices, true);
            dd($options);
            if($options['correct'] === $answer);

        }
        dd(1);
        Result::create([
            'user_id'=> Auth::user()->id,
            'exam_id'=> $id->exam_id,
            'user_id'=> $request->question,
            'user_id'=> Auth::user()->id,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResultRequest $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Result $result)
    {
        //
    }
}
