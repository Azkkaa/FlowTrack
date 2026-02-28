<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchByDateRequest;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    /**
     * Summary of searchByDate
     * @param SearchByDateRequest $request
     * @return \Illuminate\Contracts\View\View
     */
    public function byDate(SearchByDateRequest $request)
    {
        $query = Auth::user()->transactions()->with('category');

        $query->when($request->start_date, function($q) use ($request) {
            return $q->whereDate('transaction_date', '>=', $request->start_date);
        });

        $query->when($request->end_date, function($q) use($request) {
            return $q->whereDate('transaction_date', '<=', $request->end_date);
        });

        $transactions = $query->latest()->get();

        return view('main.dashboard', [
            'transactions' => $transactions
        ]);
    }
}
