<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        return view('service.index');
    }

    public function showCreate(): View|Factory|Application
    {
        return view('service.create');
    }

    public function showUpdate(): View|Factory|Application
    {
        return view('service.update');
    }

    public function showDetail(): View|Factory|Application
    {
        return view('service.detail');
    }
}
