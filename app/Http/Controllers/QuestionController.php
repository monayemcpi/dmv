<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionStoreRequest;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
       $questions = Questions::latest()->get();
       $debug=123;
       return view('questions.index',compact('questions'));


        // return view('questions.index', compact('questions'))
        //             ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'question'  => 'required|unique:questions|max:255',
        'options.*' => 'required',
        'answer'    => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

        $questions = new Questions();
        $options = [];
        $i = 0;

        foreach($request->input('options') as $value){
            $options[$i] = $value;
            $i++;
        }

       json_encode($options);

       $questions->question = $request->input('question') ;
       $questions->options = $options ;
       $questions->answer = $request->input('answer') ;
       
       if ($request -> file('image')){
        
       $imageName = time().'.'.$request ->file('image')->extension();  
       $questions->image = 'public/images/' . $imageName;

       }
       $res = $questions->save();

       if ($request -> file('image'))       
       $request->image->move(public_path('images'), $imageName);
    
       if($res)
        return redirect()->route('questions.index')
                          ->with('success', 'Question created successfully.');
        return redirect()->back()->with('danger','Something went wrong!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $questions = Questions::find($id) ;
         return view('questions.show',compact('questions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $questions = Questions::find($id);
        return view('questions.edit',compact('questions'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {   
        $validated = $request->validate([
        'question'  => 'required|unique:questions|max:255',
        'options.*' => 'required',
        'answer'    => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

        $questions = Questions::find($id);
        $options = [];
        $i = 0;

        foreach($request->input('options') as $value){
            $options[$i] = $value;
            $i++;
        }

       json_encode($options);

       $questions->question = $request->input('question') ;
       $questions->options = $options ;
       $questions->answer = $request->input('answer') ;

       if ($request -> file('image')){
        
       $imageName = time().'.'.$request ->file('image')->extension();  
       $questions->image = 'public/images/' . $imageName;

       }

       $res = $questions->update();
        if ($request -> file('image'))       
       $request->image->move(public_path('images'), $imageName);
    
       if($res)
        return redirect()->route('questions.index')
                          ->with('success', 'Question updated successfully.');
        return redirect()->back()->with('danger','Something went wrong!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $questions = Questions::find($id) ;
        $questions->delete();
         return redirect()->route('questions.index')
                        ->with('success','Question deleted successfully');
    }
}
