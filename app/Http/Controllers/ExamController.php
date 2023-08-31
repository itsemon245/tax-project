<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Result;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams      = Exam::all();
        $courses    = Course::all('id', 'name');
        return view("backend.exams.exams", compact('exams', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function results()
    {
        $results = Result::get();
        return view("backend.result.index", compact('results'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExamRequest $request)
    {
        $data = (object) $request->validated();
        Exam::create(
            [
                "course_id"     => $data->course,
                "name"          => $data->name,
                "total_marks"   => $data->total_marks,
                "passing_marks" => $data->passing_marks
            ]
        );

        return back()
            ->with(array(
                'message'       => "Exam Created Successfully",
                'alert-type'    => 'success',
            ));
    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        $exam = Exam::find($exam->id);
        $courses    = Course::all('id', 'name');

        return view("backend.exams.editExam", compact('exam', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExamRequest $request, Exam $exam)
    {
        $data = (object) $request->validated();
        Exam::find($exam->id)->update(
            [
                "course_id"     => $data->course,
                "name"          => $data->name,
                "total_marks"   => $data->total_marks,
                "passing_marks" => $data->passing_marks
            ]
        );

        return redirect()
            ->route('exams.index')
            ->with(array(
                'message'       => "Exam Updated Successfully",
                'alert-type'    => 'success',
            ));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        Exam::find($exam->id)->delete();

        return back()
            ->with(array(
                'message' => "Exam Deleted Successfully",
                'alert-type' => 'success',
            ));
    }
}
