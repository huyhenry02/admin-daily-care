<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cleaner;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class CleanerController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        $cleaners = Cleaner::all();
        return view('cleaner.list', [
            'cleaners' => $cleaners
        ]);
    }

    public function showIndexContract(): View|Factory|Application
    {
        return view('cleaner.list-contract');
    }

    public function showCreate(): View|Factory|Application
    {
        return view('cleaner.create');
    }

    public function showUpdate(): View|Factory|Application
    {
        return view('cleaner.update');
    }

    public function showDetail(Cleaner $cleaner): View|Factory|Application
    {
        return view('cleaner.detail',
            [
                'cleaner' => $cleaner
            ]);
    }
}
