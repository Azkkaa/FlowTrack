<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchByDateRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Summary of dashboard
     * @return \Illuminate\Contracts\View\View
     */
    public function dashboard()
    {
        $user = Auth::user();
        $page = request()->query('page', 1);

        $transactions = $user->transactions()->latest()
            ->skip(($page - 1) * 20)
            ->take(20)
            ->get();

        return view('main.dashboard', [
            'transactions' => $transactions,
            'page' => $page,
            'lastPage' => count($transactions),
        ]);
    }

    /**
     * Summary of searchByDate
     * @param SearchByDateRequest $request
     * @return \Illuminate\Contracts\View\View
     */
    public function searchByDate(SearchByDateRequest $request)
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
