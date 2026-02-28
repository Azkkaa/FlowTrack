<?php

namespace App\Http\Controllers;

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
}
