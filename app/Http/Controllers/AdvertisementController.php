<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        return view('advertisement.list');
    }

    public function showCreate(): View|Factory|Application
    {
        return view('advertisement.create');
    }

    public function showUpdate(): View|Factory|Application
    {
        return view('advertisement.update');
    }

    public function showDetail(): View|Factory|Application
    {
        return view('advertisement.detail');
    }
}
