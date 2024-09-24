<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\User;
use App\Models\Analisis;
use App\Models\PeopleAnswer;
use App\Models\TestQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\SubscribeTransactions;

class OnlineTestController extends Controller
{
    public function index(){
        $user = Auth::user();
        $allTest = Test::all();

        foreach ($allTest as $test) {
            $totalQuestionCount = $test->questions()->count();

            $test->canStart = true;
            if ($totalQuestionCount == 0) {
                $test->nextQuestionId = null;
                $test->canStart = false;
            } else {
                $answerQuestionsCount = PeopleAnswer::where('user_id', $user->id)
                ->whereHas('question', function($query) use ($test){
                    $query->where('test_id', $test->id);
                })->distinct()->count('test_question_id');

                if($answerQuestionsCount < $totalQuestionCount){
                    $firstUnansweredQuestion = TestQuestion::where('test_id', $test->id)
                    ->whereNotIn('id', function($query) use ($user){
                        $query->select('test_question_id')->from('people_answers')
                        ->where('user_id', $user->id);
                    })->orderBy('id', 'asc')->first();

                    $test->nextQuestionId = $firstUnansweredQuestion ? $firstUnansweredQuestion->id : null;
                
                }
                else{
                    $test->nextQuestionId = null;
                }
            }

        }
        return view('people.online_test.index',[
            'my_test' => $allTest
        ]);
    }

    public function report(){
        $user = Auth::user();
        $allTest = Test::all();

        foreach ($allTest as $test) {
            $totalQuestionCount = $test->questions()->count();

            $test->canStart = true;
            if ($totalQuestionCount == 0) {
                $test->nextQuestionId = null;
                $test->canStart = false;
            } else {
                $answerQuestionsCount = PeopleAnswer::where('user_id', $user->id)
                ->whereHas('question', function($query) use ($test){
                    $query->where('test_id', $test->id);
                })->distinct()->count('test_question_id');

                if($answerQuestionsCount < $totalQuestionCount){
                    $firstUnansweredQuestion = TestQuestion::where('test_id', $test->id)
                    ->whereNotIn('id', function($query) use ($user){
                        $query->select('test_question_id')->from('people_answers')
                        ->where('user_id', $user->id);
                    })->orderBy('id', 'asc')->first();

                    $test->nextQuestionId = $firstUnansweredQuestion ? $firstUnansweredQuestion->id : null;
                
                }
                else{
                    $test->nextQuestionId = null;
                }
            }

        }
        return view('people.online_test.dashboard_report',[
            'my_test' => $allTest
        ]);
    }

    public function onlineTest(Test $test, $question){
        $user = Auth::user();
        $isEnrolled = PeopleAnswer::where('test_question_id', $question)->where('user_id', $user->id)->exists();
        if($isEnrolled){
            abort(404);
        }
        $currentQuestion = TestQuestion::where('test_id', $test->id)->where('id', $question)->firstOrFail();
        
        return view('people.online_test.onlineTest', [
            'test' => $test,
            'question'=>$currentQuestion,
        ]);
        
    }

    public function onlineTestVisitor($test, $question){
        
        $checkTestReady =  Test::where('category_id', $test)->first();
        if(!$checkTestReady){
            abort(404);
        }
        $firstUnansweredQuestion = TestQuestion::where('test_id', $checkTestReady->id)
                    ->orderBy('id', 'asc')->first();

        if($question == 'visitor'){
            $question = $firstUnansweredQuestion ? $firstUnansweredQuestion->id : null;
        }  

        $currentQuestion = TestQuestion::where('test_id', $checkTestReady->id)->where('id', $question)->firstOrFail();
        
        return view('people.online_test.onlineTestVisitor', [
            'test' => $checkTestReady,
            'question'=>$currentQuestion,
        ]);
        
    }

    public function onlineTest_rapport(Test $test){
        $userId = Auth::id();

        $peopleAnswers = PeopleAnswer::with('question')
        ->whereHas('question', function($query) use ($test){
            $query->where('test_id', $test->id);
        })->where('user_id', $userId)->get();

        $totalQuestions = TestQuestion::where('test_id', $test->id)->count();
        $totalValue = 0;

        foreach ($peopleAnswers as $ans) {
            $totalValue += $ans->value;
        }

        $analisis = Analisis::where('category_id', $test->category_id)
            ->where('max-score', '>=', $totalValue)
            ->where('min-score', '<=', $totalValue)
            ->get();
        //$correctAnswersCount = $peopleAnswers->where('answer', 'correct')->count();
        //$passed = $correctAnswersCount == $totalQuestions;


        return view('people.online_test.onlineTest_rapport', [
            //'passed' => $passed,
            'test' => $test,
            'peopleAnswers' => $peopleAnswers,
            'totalQuestions' => $totalQuestions,
            'totalValue' => $totalValue,
            'analisis' => $analisis
            //'correctAnswersCount' => $correctAnswersCount,
        ]);
    }

    public function onlineTest_finished(Test $test){
        $userId = Auth::id();

        $peopleAnswers = PeopleAnswer::with('question')
        ->whereHas('question', function($query) use ($test){
            $query->where('test_id', $test->id);
        })->where('user_id', $userId)->get();

        $totalQuestions = TestQuestion::where('test_id', $test->id)->count();
        $totalValue = 0;

        foreach ($peopleAnswers as $ans) {
            $totalValue += $ans->value;
        }

        $analisis = Analisis::where('category_id', $test->category_id)
            ->where('max-score', '>=', $totalValue)
            ->where('min-score', '<=', $totalValue)
            ->get();
            
        return view('people.online_test.onlineTest_finished', [
            'test' => $test,
            'analisis' => $analisis
        ]);
    }
    public function onlineTest_finishedVisitor(Test $test){
        $userId = User::where('email','visitor@admin.com')->first();
        
        $peopleAnswers = PeopleAnswer::with('question')
        ->whereHas('question', function($query) use ($test){
            $query->where('test_id', $test->id);
        })->where('user_id', $userId->id)->get();

        $totalQuestions = TestQuestion::where('test_id', $test->id)->count();
        $totalValue = 0;

        foreach ($peopleAnswers as $ans) {
            $totalValue += $ans->value;
        }
        $analisis = Analisis::where('category_id', $test->category_id)
            ->where('max-score', '>=', $totalValue)
            ->where('min-score', '<=', $totalValue)
            ->get();
            
        return view('people.online_test.onlineTest_finishedVisitor', [
            'test' => $test,
            'analisis' => $analisis
        ]);
    }

    public function price(){
        $user = Auth::user();
        return view('price', [
            'user' => $user
        ]);
    }

    public function checkout(){
        $user = Auth::user();
         if ($user->id !== 1) {
            $isEnrolled = SubscribeTransactions::where('user_id',$user->id)->exists();
            if($isEnrolled){
                return redirect()->route('price')->with('error', 'Anda tidak diizinkan untuk mengakses halaman checkout.');
            }
            return view('checkout', [
                'user' => $user
            ]);
         }else {
             // Redirect ke halaman lain atau tampilkan pesan kesalahan jika user adalah student
             return redirect()->route('price')->with('error', 'Anda tidak diizinkan untuk mengakses halaman checkout.');
         }
    }


    public function payment(Request $request){
        
        $user = Auth::user();
        $validated = $request->validate([
            'file' => 'required|image|mimes:png,jpg,svg|max:2048',
            'totalAmount' => 'required|numeric',
        ]);
    
        DB::beginTransaction();
    
        try {
            if ($request->hasFile('file')) {
                $coverPath = $request->file('file')->store('product_covers', 'public');
                $validated['proof'] = $coverPath;
            }
    
            $user->subscribeTransaction()->create([
                'total_amount' => $validated['totalAmount'],
                'is_active' => false,
                'proof' => $coverPath
            ]);
            DB::commit();
            return redirect()->route('user.dashboard');
        } catch (Exception $e) {
            DB::rollback();
            $error = ValidationException::withMessages([
                'system_error' => ['System error!'],
            ]);
    
            throw $error;
        }
    }
}
