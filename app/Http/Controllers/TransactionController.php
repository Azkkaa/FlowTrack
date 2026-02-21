<?php

namespace App\Http\Controllers;

use App\Http\Requests\Transaction\TransactionDeleteRequest;
use App\Http\Requests\Transaction\TransactionEditRequest;
use App\Http\Requests\Transaction\TransactionStoreRequest;
use App\Http\Requests\Transaction\TransactionUpdateRequest;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('main.create-transaction');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransactionStoreRequest $request)
    {
        try {
            $categoryId = Category::where('slug', '=', $request->category)->value('id');

            $transaction = $request->user()->transactions()->create([
                'category_id' => $categoryId,
                'nominal' => $request->nominal,
                'notes' => $request->notes,
                'transaction_date' => $request->date
            ]);

            $transaction->load('category');

            return response()->json([
                'message' => 'Transaction sucessfully saved!',
                'data' => $transaction,
                'type' => $request->type
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransactionEditRequest $request)
    {
        $transaction = Transaction::with('category')->find($request->transactionId);

        $categoriesType = Category::where('type', '=', $transaction->category->type)->get();

        return view('main.edit-transaction', [
            'transaction' => $transaction,
            'categoriesType' => $categoriesType
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransactionUpdateRequest $request)
    {
        try {
            $transaction = Auth::user()
                    ->transactions()
                    ->find($request->transaction);
            if (!$transaction) {
                return response()->json([
                    'message' => 'Data tidak ditemukan!'
                ], 404);
            }

            $categoryId = Category::where('slug', '=', $request->category)->value('id');

            $transaction->update([
                'category_id' => $categoryId,
                'nominal' => $request->nominal,
                'notes' => $request->notes,
                'transaction_date' => $request->date,
            ]);

            return response()->json([
                'message' => 'Data berhasil diperbarui!'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransactionDeleteRequest $request)
    {
        $transactionId = $request->transaction;

        $transaction = Transaction::find($transactionId);

        if (!$transaction) {
            return abort(404);
        }

        $transaction->delete();
        return back()->with('success', 'Data transaction has been deleted!');
    }
}
