<?php

namespace App\Http\Controllers;

use Exeception;
use App\Models\Test;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Tests = Test::orderBy('id', 'DESC')->get();
        return view('admin.test.index',[
            'tests' => $Tests
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.test.create', [
            'categories' => $categories
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
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'cover' => 'required|image|mimes:png,jpg,svg',
        ]);

        DB::beginTransaction();

        try{
            if($request->hasFile('cover')){
                $coverPath = $request->file('cover')->store('product_covers', 'public');//productcovers itu folder di public
                $validated['cover']= $coverPath;
            }
            $validated['slug'] = Str::slug($request->name);
            $newTest = Test::create($validated);

            DB::commit();
            return redirect()->route('dashboard.test.index');
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
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        $questions = $test->questions()->orderBy('id', 'DESC')->get();

        return view('admin.test.manage', [
            'test' => $test,
            'questions' => $questions
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        $categories = Category::all();
        return view('admin.test.edit',[
            'test' => $test,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'cover' => 'sometimes|image|mimes:png,jpg,svg',
        ]);

        DB::beginTransaction();

        try{
            if($request->hasFile('cover')){
                $coverPath = $request->file('cover')->store('product_covers', 'public');//productcovers itu folder di public
                $validated['cover']= $coverPath;
            }
            $validated['slug'] = Str::slug($request->name);
            $test->update($validated);

            DB::commit();
            return redirect()->route('dashboard.test.index');
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
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
        try{
            $test->delete();
            return redirect()->route('dashboard.test.index');

        }catch(\Exception $e){
            DB::rolback();
            $error = ValidationException::withMessages([
                'system_error' => ['System error!', $e->getMessage()],
            ]);
            
            throw $error;
        }
    }
}
