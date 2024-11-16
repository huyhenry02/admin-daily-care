<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        return view('customer.index');
    }

    public function showCreate(): View|Factory|Application
    {
        return view('customer.create');
    }

    public function showUpdate(): View|Factory|Application
    {
        return view('customer.update');
    }

    public function showDetail(): View|Factory|Application
    {
        return view('customer.detail');
    }
}
