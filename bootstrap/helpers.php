<?php

use App\Models\Questions;

function correctAnswer(string $id){

 if(isset($id)){
    $questions= Questions::find($id)->first();
  
  if (array_key_exists($questions->answer, $questions->options)){
    return $questions->options[$questions->answer];
  }

 }

   


}