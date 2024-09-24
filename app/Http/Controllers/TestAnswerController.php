<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Test;
use App\Models\User;
use App\Models\TestAnswer;
use App\Models\PeopleAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class TestAnswerController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestAnswer  $testAnswer
     * @return \Illuminate\Http\Response
     */
    public function show(TestAnswer $testAnswer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestAnswer  $testAnswer
     * @return \Illuminate\Http\Response
     */
    public function edit(TestAnswer $testAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TestAnswer  $testAnswer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestAnswer $testAnswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestAnswer  $testAnswer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        $userId = User::where('email', 'visitor@admin.com')->first();
        $peopleAnswers = PeopleAnswer::where('user_id', $userId->id)->get();
        //dd($test->id);
        DB::beginTransaction();
        try{
            foreach ($peopleAnswers as $peopleAnswer) {
                $peopleAnswer->delete();
            }
            DB::commit(); 
            return redirect()->to('/');

        }catch(Exception $e){
            DB::rollback();
            $error = ValidationException::withMessages([
                'system_error' => ['System error!', $e->getMessage()],
            ]);
            
            throw $error;
        }
    }
}
