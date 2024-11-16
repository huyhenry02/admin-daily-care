<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class CleanerController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        return view('cleaner.list');
    }

    public function showCreate(): View|Factory|Application
    {
        return view('cleaner.create');
    }

    public function showUpdate(): View|Factory|Application
    {
        return view('cleaner.update');
    }

    public function showDetail(): View|Factory|Application
    {
        return view('cleaner.detail');
    }
}