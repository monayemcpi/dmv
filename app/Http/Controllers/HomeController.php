<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ExamRecord;
use App\Models\Questions;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $questions = Questions::count();
        $exams = Exam::count();
        $lastExam = ExamRecord::latest()->first();

        return view('home.index',compact('questions','exams','lastExam'));
    }
}
