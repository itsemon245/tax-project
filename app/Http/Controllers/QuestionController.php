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
            'correct' => $data->currect_ans,
            'options' => [$data->option1, $data->option2, $data->option3, $data->option4],
        ];

        Question::create(
            [
                'exam_id'   => $request->exam_id,
                'name'      => $data->question,
                'mark'      => $data->mark,
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
        $questions  = Question::where('exam_id', $exam_id)->get();
        $exam       = Exam::find($exam_id, ['id', 'name']);
        return view('backend.exams.questions.questions', compact('questions', 'exam'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = Question::find($id);
        return view('backend.exams.questions.editQuestion', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, string $id)
    {
        $data = (object) $request->validated();
        $choices = (object) [
            'options' => [$data->option1, $data->option2, $data->option3, $data->option4],
            'correct' => $data->currect_ans
        ];
        Question::find($id)->update(
            [
                'name'      => $data->question,
                'mark'      => $data->mark,
                'choices'   => json_encode($choices),
            ]
        );

        return redirect()
            ->route('questions.show', $request->exam_id)
            ->with(array(
                'message'       => "Question Updated Successfully",
                'alert-type'    => 'success',
            ));
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
