<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exam;
use App\Models\Result;
use Illuminate\Http\Request;

class MCQController extends Controller {
    public function index(Request $request) {
        $exam = Course::find($request->course_id)->exam;

        return view('frontend.pages.mcq.index', compact('exam'));
    }

    public function store(Request $request, Exam $exam) {
        $questions = $request->questions;
        $wrong = 0;
        $right = 0;
        $marks = 0;
        foreach ($exam->questions as $key => $question) {
            $i = $key + 1;
            $answer = $request['question_'.$i.'_answer'];
            $options = $question->choices->options;
            $correct = $question->choices->correct;
            $isCorrect = $answer === $options[$correct];
            if ($isCorrect) {
                ++$right;
                $marks += $question->mark;
            } else {
                ++$wrong;
            }
        }
        $hasPassed = ($marks >= $exam->passing_marks);
        // dd([
        //     'passing' => $exam->passing_marks,
        //     'my_marks' => $marks,
        //     'isPassed' => $hasPassed
        // ]);
        $score = ($marks * 100) / $exam->total_marks;
        $score = round($score, 2);
        $result = Result::create([
            'user_id' => auth()->id(),
            'exam_id' => $exam->id,
            'right' => $right,
            'wrong' => $wrong,
            'obtained_marks' => $marks,
            'score' => $score,
            'has_passed' => $hasPassed,
        ]);

        return view('frontend.pages.mcq.result', compact('result'));
    }
}
