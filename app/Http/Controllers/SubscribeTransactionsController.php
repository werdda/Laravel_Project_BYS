<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\SubscribeTransactions;
use Illuminate\Validation\ValidationException;

class SubscribeTransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userPremium = SubscribeTransactions::orderBy('id', 'DESC')->get();
        return view('admin.test.index_subs',[
            'userPremium' => $userPremium
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
     * @param  \App\Models\SubscribeTransactions  $subscribeTransactions
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userPremium = SubscribeTransactions::find($id);
        return view('admin.test.edit_subs',[
            'userPremium' => $userPremium
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubscribeTransactions  $subscribeTransactions
     * @return \Illuminate\Http\Response
     */
    public function edit(SubscribeTransactions $subscribeTransactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubscribeTransactions  $subscribeTransactions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        DB::beginTransaction();
        try{
            // Debugging: Periksa ID yang diterima dari request
            Log::info('SubscribeTransaction ID received: ' . $id);

            // Coba untuk menemukan data berdasarkan ID
            $subscribeTransaction = SubscribeTransactions::findOrFail($id);

            // Update data
            $subscribeTransaction->update([
                'subscription_start_date' => Carbon::now(),
                'is_active' => 1
            ]);

            DB::commit();
            return redirect()->route('dashboard.premium.index');
        }catch(Exception $e){
            DB::rollback();
            $error = ValidationException::withMessages([
                'system_error' => ['System error!', $e->getMessage()],
            ]);

            throw $error;
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubscribeTransactions  $subscribeTransactions
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubscribeTransactions $subscribeTransactions)
    {
        //
    }
}
