<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Models\RevenueSystem;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class ReportController extends Controller
{
    public function showReportRevenue(Request $request): View|Factory|Application
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        $revenueQuery = RevenueSystem::join('orders', 'orders.id', '=', 'revenue_systems.order_id')
            ->selectRaw('SUM(revenue_systems.revenue_amount) as totalRevenue')
            ->when($startDate, function ($query) use ($startDate) {
                return $query->whereDate('orders.created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->whereDate('orders.created_at', '<=', $endDate);
            })
            ->first();

        $paidOrders = Order::where('pay_status', 'paid')
            ->when($startDate, function ($query) use ($startDate) {
                return $query->whereDate('orders.created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->whereDate('orders.created_at', '<=', $endDate);
            })
            ->count();

        $unpaidOrders = Order::where('pay_status', 'pending')
            ->when($startDate, function ($query) use ($startDate) {
                return $query->whereDate('orders.created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->whereDate('orders.created_at', '<=', $endDate);
            })
            ->count();

        $revenueByService = RevenueSystem::join('orders', 'orders.id', '=', 'revenue_systems.order_id')
            ->selectRaw('orders.service_type, SUM(revenue_systems.revenue_amount) as totalRevenue')
            ->when($startDate, function ($query) use ($startDate) {
                return $query->whereDate('orders.created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->whereDate('orders.created_at', '<=', $endDate);
            })
            ->groupBy('orders.service_type')
            ->get();

        $revenueDetails = RevenueSystem::join('orders', 'orders.id', '=', 'revenue_systems.order_id')
            ->join('users', 'users.id', '=', 'orders.customer_id')
            ->select('users.id as customer_id', 'users.name', DB::raw('SUM(revenue_systems.revenue_amount) as totalRevenue'))
            ->when($startDate, function ($query) use ($startDate) {
                return $query->whereDate('orders.created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->whereDate('orders.created_at', '<=', $endDate);
            })
            ->groupBy('users.id', 'users.name')
            ->get();


        return view('report.revenue', [
            'totalRevenue' => $revenueQuery->totalRevenue ?? 0,
            'paidOrders' => $paidOrders,
            'unpaidOrders' => $unpaidOrders,
            'revenueByService' => $revenueByService,
            'revenueDetails' => $revenueDetails,
        ]);
    }

    public function showReportOrder(Request $request): View|Factory|Application
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        $totalOrders = Order::when($startDate, function ($query) use ($startDate) {
            return $query->whereDate('created_at', '>=', $startDate);
        })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->whereDate('created_at', '<=', $endDate);
            })
            ->count();

        $averageRatings = Order::when($startDate, function ($query) use ($startDate) {
            return $query->whereDate('created_at', '>=', $startDate);
        })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->whereDate('created_at', '<=', $endDate);
            })
            ->avg('rating');

        $canceledOrders = Order::where('status', 'canceled')
            ->when($startDate, function ($query) use ($startDate) {
                return $query->whereDate('created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->whereDate('created_at', '<=', $endDate);
            })
            ->count();

        $orderStatusCounts = Order::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->when($startDate, function ($query) use ($startDate) {
                return $query->whereDate('created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->whereDate('created_at', '<=', $endDate);
            })
            ->get();

        $ordersByMonth = Order::selectRaw('MONTH(created_at) as month, count(*) as total')
            ->groupBy('month')
            ->when($startDate, function ($query) use ($startDate) {
                return $query->whereDate('created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->whereDate('created_at', '<=', $endDate);
            })
            ->get()
            ->keyBy('month');

        $monthlyData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyData[] = $ordersByMonth->get($i)->total ?? 0;
        }

        return view('report.order', [
            'totalOrders' => $totalOrders,
            'averageRatings' => $averageRatings,
            'canceledOrders' => $canceledOrders,
            'orderStatusCounts' => $orderStatusCounts,
            'monthlyData' => $monthlyData,
        ]);
    }

    public function showReportComplaint(Request $request): View|Factory|Application
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        $totalComplaints = Complaint::when($startDate, function ($query) use ($startDate) {
            return $query->where('created_at', '>=', $startDate);
        })->when($endDate, function ($query) use ($endDate) {
            return $query->where('created_at', '<=', $endDate);
        })->count();

        $pendingComplaints = Complaint::when($startDate, function ($query) use ($startDate) {
            return $query->where('created_at', '>=', $startDate);
        })->when($endDate, function ($query) use ($endDate) {
            return $query->where('created_at', '<=', $endDate);
        })->where('status', 'pending')->count();

        $resolvedComplaints = Complaint::when($startDate, function ($query) use ($startDate) {
            return $query->where('created_at', '>=', $startDate);
        })->when($endDate, function ($query) use ($endDate) {
            return $query->where('created_at', '<=', $endDate);
        })->whereIn('status', ['approved', 'rejected'])->count();

        $complaintByCustomer = Complaint::when($startDate, function ($query) use ($startDate) {
            return $query->where('created_at', '>=', $startDate);
        })->when($endDate, function ($query) use ($endDate) {
            return $query->where('created_at', '<=', $endDate);
        })->whereHas('complaintBy', function ($query) {
            return $query->where('role_type', 'customer');
        })->count();

        $complaintByEmployee = Complaint::when($startDate, function ($query) use ($startDate) {
            return $query->where('created_at', '>=', $startDate);
        })->when($endDate, function ($query) use ($endDate) {
            return $query->where('created_at', '<=', $endDate);
        })->whereHas('complaintBy', function ($query) {
            return $query->where('role_type', 'cleaner');
        })->count();

        $employeeComplaints = Complaint::select('complaint_by_id', DB::raw('count(*) as count'))
            ->when($startDate, function ($query) use ($startDate) {
                return $query->where('created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->where('created_at', '<=', $endDate);
            })
            ->whereHas('complaintBy', function ($query) {
                return $query->where('role_type', 'cleaner');
            })
            ->groupBy('complaint_by_id')
            ->get();

        $customerComplaints = Complaint::select('complaint_by_id', DB::raw('count(*) as count'))
            ->when($startDate, function ($query) use ($startDate) {
                return $query->where('created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->where('created_at', '<=', $endDate);
            })
            ->whereHas('complaintBy', function ($query) {
                return $query->where('role_type', 'customer');
            })
            ->groupBy('complaint_by_id')
            ->get();
        return view('report.complaint', [
            'totalComplaints' => $totalComplaints,
            'pendingComplaints' => $pendingComplaints,
            'resolvedComplaints' => $resolvedComplaints,
            'complaintByCustomer' => $complaintByCustomer,
            'complaintByEmployee' => $complaintByEmployee,
            'employeeComplaints' => $employeeComplaints,
            'customerComplaints' => $customerComplaints,
        ]);
    }
}
