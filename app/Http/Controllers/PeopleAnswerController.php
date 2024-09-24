<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\User;
use App\Models\TestAnswer;
use App\Models\PeopleAnswer;
use App\Models\TestQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PeopleAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Test $test, $question)
    {
        
        $question_details = TestQuestion::where('id', $question)->first();

        $validated = $request->validate([
            'answer_id' => 'required|exists:test_answers,id'
        ]);

        DB::beginTransaction();

        try {
            $selectedAnswer = TestAnswer::find($validated['answer_id']);
            
            if($selectedAnswer->test_question_id != $question){
                $error = ValidationException::withMessages([
                    'system_error' => ['System error!' . ['Jawaban tidak tersedia pada pertanyaan!']],
                ]);
                throw $error;
            }

            $existingAnswer = PeopleAnswer::where('user_id', Auth::id())->where('test_question_id', $question)
            ->first();

            if($existingAnswer){
                $error = ValidationException::withMessages([
                    'system_error' => ['System error!' . ['Kamu telah menjawab pertanyaan ini sebelumnya!']],
                ]);
                throw $error;
            }

            $answerValue = $selectedAnswer->value;

            PeopleAnswer::create([
                'user_id' => Auth::id(),
                'value' => $answerValue,
                'test_question_id' => $question,
                'answer' => $answerValue
            ]);

            DB::commit();

            $nextQuestion = TestQuestion::where('test_id', $test->id)
            ->where('id', '>', $question)
            ->orderBy('id', 'asc')
            ->first();
            
            if($nextQuestion){
                return redirect()->route('dashboard.onlineTest.test', ['test' => $test->id, 'question' => $nextQuestion->id]);
            }
            else{
                return redirect()->route('dashboard.onlineTest.finished.test', $test->id);
            }

            

        } catch (\Exception $e) {
            DB::rollback();
            $error = ValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()]
            ]);

            throw $error;
        }
    }

    public function storeVisitor(Request $request, Test $test, $question)
    {
        
        $question_details = TestQuestion::where('id', $question)->first();

        $validated = $request->validate([
            'answer_id' => 'required|exists:test_answers,id'
        ]);

        DB::beginTransaction();

        try {
            $selectedAnswer = TestAnswer::find($validated['answer_id']);
            
            $answerValue = $selectedAnswer->value;
            $visitor = User::where('email', 'visitor@admin.com')->first();
            PeopleAnswer::create([
                'user_id' => $visitor->id,
                'value' => $answerValue,
                'test_question_id' => $question,
                'answer' => $answerValue
            ]);

            DB::commit();

            $nextQuestion = TestQuestion::where('test_id', $test->id)
            ->where('id', '>', $question)
            ->orderBy('id', 'asc')
            ->first();
            
            if($nextQuestion){
                return redirect()->route('onlineTest.visitor.test', ['test' => $test->id, 'question' => $nextQuestion->id]);
            }
            else{
                return redirect()->route('onlineTest.visitor.finished.test', $test->id);
            }

            

        } catch (\Exception $e) {
            DB::rollback();
            $error = ValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()]
            ]);

            throw $error;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PeopleAnswer  $peopleAnswer
     * @return \Illuminate\Http\Response
     */
    public function show(PeopleAnswer $peopleAnswer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PeopleAnswer  $peopleAnswer
     * @return \Illuminate\Http\Response
     */
    public function edit(PeopleAnswer $peopleAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PeopleAnswer  $peopleAnswer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PeopleAnswer $peopleAnswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PeopleAnswer  $peopleAnswer
     * @return \Illuminate\Http\Response
     */
    public function destroy(PeopleAnswer $peopleAnswer)
    {
        //
    }
}
