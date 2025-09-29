<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ExamRecord;
use App\Models\Questions;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $examRecord = ExamRecord::latest()->get();
       return view('exams.index',compact('examRecord'));


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
        $validated = $request->validate([
        'answer'    => 'required',
    ]);
       
        $examRecordId = $request->input('exam_record_id');
        $question_id = $request->input('question_id');
        $answer = $request->input('answer');

        // Store record to exam table
        $exams = new Exam();
        $exams->question_id = $question_id ;
        $exams->exam_record_id = $examRecordId;
        $exams->answer = $answer;
        $exams->status = $this->answerStatus($question_id,$answer);
        $exams->save();

        // Store record to result table
        $result = new Result();
        $result->question_id = $question_id ;
        $result->exam_record_id = $examRecordId;
        $result->answer = $answer;
        $result->status = $this->answerStatus($question_id,$answer);
        $result->save();


       
        $questionIds = Exam::pluck('question_id')->all();
        $question = Questions::whereNotIn('id', $questionIds)->inRandomOrder()->first();

        if($question){
            if($this->answerStatus($question_id,$answer) == true){
                return view('exams.create',compact('examRecordId','question'))->with('success','Correct Answer');
            }
            else{
                return view('exams.create',compact('examRecordId','question'))->with('danger','Wrong Answer');
            }
               
        }
            
        else{
            Exam::truncate();
             $examRecord = ExamRecord::latest()->get();
            return view('exams.index',compact('examRecord'))->with('success','Exam Finished!');

        }

        


    }









    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = DB::table('results')
        ->join('questions', 'results.question_id', '=', 'questions.id')
        ->select('questions.question', 'results.status')
        ->where('results.exam_record_id',$id)
        ->get();
        return view('exams.show',compact('result'));
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
        // Delete Exam Records from Result
        $results = Result::where('exam_record_id',$id)->get();
        foreach($results as $result){
            $resultDel=Result::find($result->id);
            $resultDel->delete();
        }
        // Delete Exam Record
        $examRecord = ExamRecord::find($id);
        $examRecord->delete();
       return redirect()->route('exams.index');

    }

    public function answerStatus($id,$answer){
   
        $question = Questions::where('id',$id)->first();
        $debug=123;
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
