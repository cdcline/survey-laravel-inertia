<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QuestionController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      return Inertia::render('Questions/Index', [
         'surveys' => Survey::with('user:id,name')->latest()->get(),
         'answerTypes' => config('question.answer_types')
      ]);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      //
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\StoreQuestionRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreQuestionRequest $request)
   {
      $validated = $request->validated();
      $request->user()->questions()->create($validated);
      return redirect(route('question.index'));
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Question  $question
    * @return \Illuminate\Http\Response
    */
   public function show(Question $question)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Question  $question
    * @return \Illuminate\Http\Response
    */
   public function edit(Question $question)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Question  $question
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Question $question)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Question  $question
    * @return \Illuminate\Http\Response
    */
   public function destroy(Question $question)
   {
      //
   }
}
