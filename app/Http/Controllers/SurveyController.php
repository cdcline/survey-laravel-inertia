<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SurveyController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      return Inertia::render('Surveys/Index', [
         'surveys' => Survey::with('user:id,name')->latest()->get(),
      ]);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return Inertia::render('Surveys/Edit', [
         //
      ]);
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $validated = $request->validate([
         'title' => 'required|string|max:255',
      ]);

      $request->user()->surveys()->create($validated);

      return redirect(route('survey.index'));
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Survey  $survey
    * @return \Illuminate\Http\Response
    */
   public function show(Survey $survey)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Survey  $survey
    * @return \Illuminate\Http\Response
    */
   public function edit(Survey $survey)
   {
      return Inertia::render('Surveys/Edit', [
         //
      ]);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Survey  $survey
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Survey $survey)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Survey  $survey
    * @return \Illuminate\Http\Response
    */
   public function destroy(Survey $survey)
   {
      //
   }
}
