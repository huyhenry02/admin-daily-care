<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        return view('report.index');
    }

    public function showCreate(): View|Factory|Application
    {
        return view('report.create');
    }

    public function showUpdate(): View|Factory|Application
    {
        return view('report.update');
    }

    public function showDetail(): View|Factory|Application
    {
        return view('report.detail');
    }
}
