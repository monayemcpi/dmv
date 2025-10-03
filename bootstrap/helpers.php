<?php

use App\Models\Questions;

function correctAnswer(string $id){

 if(isset($id)){
    $questions= Questions::where('id',$id)->first();
   //return $questions->answer;
  
return $questions->options[$questions->answer];

 }

   


}