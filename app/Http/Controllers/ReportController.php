<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function showReportRevenue(): View|Factory|Application
    {
        return view('report.revenue');
    }
    public function showReportCustomer(): View|Factory|Application
    {
        return view('report.customer');
    }
    public function showReportOrder(): View|Factory|Application
    {
        return view('report.order');
    }
}
