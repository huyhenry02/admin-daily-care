<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        $accounts = User::all();
        return view('account.list', [
            'accounts' => $accounts
        ]);
    }

    public function showCreate(): View|Factory|Application
    {
        return view('account.create');
    }

    public function showUpdate(): View|Factory|Application
    {
        return view('account.update');
    }

    public function showDetail(): View|Factory|Application
    {
        return view('account.detail');
    }
}
