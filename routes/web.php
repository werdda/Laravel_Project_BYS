<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OnlineTestController;
use App\Http\Controllers\TestAnswerController;
use App\Http\Controllers\TestPeopleController;
use App\Http\Controllers\PeopleAnswerController;
use App\Http\Controllers\TestQuestionController;
use App\Http\Controllers\SubscribeTransactionsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin/test/dashboard');
})->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');

Route::get('/user/dashboard', function () {
    return view('people/online_test/dashboard');
})->middleware(['auth', 'verified', 'role:people'])->name('user.dashboard');


Route::get('/online-test/{test}/{question}', [OnlineTestController::class, 'onlineTestVisitor'])
->name('onlineTest.visitor.test');

Route::get('/online-test/finished/visitor/{test}', [OnlineTestController::class, 'onlineTest_finishedVisitor'])
->name('onlineTest.visitor.finished.test');


Route::post('/online-test/{test}/{question}', [PeopleAnswerController::class, 'storeVisitor'])
->name('onlineTest.visitor.test.answer.store');


Route::resource('testAnswer', TestAnswerController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/price', [OnlineTestController::class, 'price'])->name('price');
    Route::get('/checkout', [OnlineTestController::class, 'checkout'])->name('checkout');
    Route::post('/checkout/payment', [OnlineTestController::class, 'payment'])->name('payment');
    
    Route::prefix('/admin/dashboard')->name('dashboard.')->group(function(){

        //course 
        Route::resource('test', TestController::class)
        ->middleware('role:admin');
        
        Route::resource('premium', SubscribeTransactionsController::class)
        ->middleware('role:admin');

        //course question
        Route::get('/test/question/create/{test}', [TestQuestionController::class, 'create'])
        ->middleware('role:admin')
        ->name('test.create.question');

        Route::post('/test/question/save/{test}', [TestQuestionController::class, 'store'])
        ->middleware('role:admin')
        ->name('test.create.question.store');

        Route::resource('test_questions', TestQuestionController::class)
        ->middleware('role:admin');


    });

    Route::prefix('/user/dashboard')->name('dashboard.')->group(function(){

        Route::get('/online-test/finished/{test}', [OnlineTestController::class, 'onlineTest_finished'])
        ->middleware('role:people')
        ->name('onlineTest.finished.test');

        Route::get('/online-test/rapport/{test}', [OnlineTestController::class, 'onlineTest_rapport'])
        ->middleware('role:people')
        ->name('onlineTest.rapport.test');

        Route::get('/online-test', [OnlineTestController::class, 'index'])
        ->middleware('role:people')
        ->name('onlineTest.index');

        
        Route::get('/online-test/report', [OnlineTestController::class, 'report'])
        ->middleware('role:people')
        ->name('onlineTest.report');

        Route::get('/online-test/{test}/{question}', [OnlineTestController::class, 'onlineTest'])
        ->middleware('role:people')
        ->name('onlineTest.test');

        Route::post('/online-test/{test}/{question}', [PeopleAnswerController::class, 'store'])
        ->middleware('role:people')
        ->name('onlineTest.test.answer.store');
        
    });
});

require __DIR__.'/auth.php';
