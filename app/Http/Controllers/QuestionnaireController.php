<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('questionnaire.create');
    }

    public function store(){
        $data = $this->validatedData();
        //saving the questionnaire through the user
        $questionnaire = auth()->user()->questionnaires()->create($data);

        return redirect('/questionnaires/'. $questionnaire->id);
    }

    public function show(Questionnaire $questionnaire)
    {
        $questionnaire->load('questions.answers.responses');
        return view('questionnaire.show', compact('questionnaire'));
    }

    public function validatedData()
    {
        return request()->validate([
            'title'=> 'required',
            'purpose'=> 'required'
        ]);
    }
}
