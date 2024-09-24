<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\TestQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestQuestionController extends Controller
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
    public function create(Test $test)
    {
        return view('admin.questions.create', [
            'test' =>$test
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Test $test)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answers' => 'required|array',
            'answers.*' => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        try{

            $question = $test->questions()->create([//bagian questions ceknya di model course
                'question' => $request->question
            ]);

            foreach($request->answers as $index => $answer){
                $question->answers()->create([
                    'answer' => $answer,
                    'value' => $index
                ]);
            };

            DB::commit();
            return redirect()->route('dashboard.test.show', $test->id);
        }catch(Exeception $e){
            DB::rollback();
            $error = ValidationException::withMessages([
                'system_error' => ['System error!', $e->getMessages()],
            ]);

            throw $error;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestQuestion  $testQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(TestQuestion $testQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestQuestion  $testQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(TestQuestion $testQuestion)
    {
        $test = $testQuestion->test;

        return view('admin.questions.edit', [
            'testQuestion' => $testQuestion,
            'test' => $test,
            'answers' => $testQuestion->answers
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TestQuestion  $testQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestQuestion $testQuestion)
    {
        //dd($request->all());
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answers' => 'required|array',
            'answers.*' => 'required|string|max:255',
        ]);


        DB::beginTransaction();

        try{

            $testQuestion->update([//bagian questions ceknya di model course
                'question' => $request->question,
            ]);

            $testQuestion->answers()->delete();

            foreach($request->answers as $index => $answer){
                $testQuestion->answers()->create([
                    'answer' => $answer,
                    'value' => $index
                ]);
            };

            DB::commit();
            return redirect()->route('dashboard.test.show', $testQuestion->test_id);
        }catch(Exeception $e){
            DB::rollback();
            $error = ValidationException::withMessages([
                'system_error' => ['System error!', $e->getMessages()],
            ]);

            throw $error;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestQuestion  $testQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestQuestion $testQuestion)
    {
        try{
            $testQuestion->answers()->delete();
            $testQuestion->delete();
            return redirect()->route('dashboard.test.show',  $testQuestion->test_id);

        }catch(\Exception $e){
            DB::rolback();
            $error = ValidationException::withMessages([
                'system_error' => ['System error!', $e->getMessage()],
            ]);
            
            throw $error;
        }
    }
}
