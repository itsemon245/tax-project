<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
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
    public function store(StoreQuestionRequest $request)
    {
        $data =  $request->validated();
        $choices = [
            'options' => $request->options,
            'correct' => $request->correct,
        ];

        Question::updateOrCreate(
            ['id' => $request->question_id],
            [
                'exam_id'   => $request->exam_id,
                'name'      => $request->question,
                'mark'      => $request->mark,
                'choices'   => $choices,
            ]
        );

        return back()
            ->with(array(
                'message'       => "Question Created Successfully",
                'alert-type'    => 'success',
            ));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $exam_id)
    {
        $questions  = Question::where('exam_id', $exam_id)->latest()->paginate(paginateCount());
        $exam       = Exam::find($exam_id, ['id', 'name']);
        $question = null;
        return view('backend.exams.questions.questions', compact('questions', 'exam', 'question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = Question::find($id);
        $exam       = Exam::find($question->exam->id, ['id', 'name']);
        $questions  = $exam->questions;
        return view('backend.exams.questions.questions', compact('questions', 'exam', 'question'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Question::find($id)->delete();
        return back()
            ->with(array(
                'message' => "Question Deleted Successfully",
                'alert-type' => 'success',
            ));
    }
}
