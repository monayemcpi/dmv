<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ExamRecord;
use App\Models\Questions;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $exams = Exam::latest()->get();
       return view('exams.index',compact('exams'));


        // return view('exams.index', compact('exams'))
        //             ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
  
        // Store data into the exam record table
        $examRecord = new ExamRecord();
        $examRecord->date = date('Y-m-d');
        $examRecord->time = now();
        $examRecord->save();

        if($examRecord){
           $examRecordId = $examRecord->id;
           $question = Questions::inRandomOrder()->first();
           return view('exams.create',compact('examRecordId','question'));
        }


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $examRecordId = $request->input('exam_record_id');
        $question_id = $request->input('question_id');
        $answer = $request->input('answer');

        $exams = new Exam();
        $exams->question_id = $question_id ;
        $exams->exam_record_id = $examRecordId;
        $exams->answer = $answer;
        $exams->status = $this->answerStatus($question_id,$answer);
        $exams->save();
       
        $questionIds = Exam::pluck('question_id')->all();
        $question = Questions::whereNotIn('id', $questionIds)->first();
        if($question)
            return view('exams.create',compact('examRecordId','question'));

        return ;

        


    }









    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function answerStatus($id,$answer){
        $question = Questions::find($id)->first();
        if($question->answer == $answer){
            return true;
        }
        return false;
    }

    public function getQuestionId($questionId){

          $question = Questions::find($questionId)->first();
          return $question;
          //dd($question->id);
         

    }




}
