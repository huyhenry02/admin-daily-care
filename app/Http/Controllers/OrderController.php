<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Complaint;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class OrderController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        $orders = Order::all();
        return view('order.list'
            , [
                'orders' => $orders
            ]);
    }

    public function showCreate(): View|Factory|Application
    {
        return view('order.create');
    }

    public function showUpdate(): View|Factory|Application
    {
        return view('order.update');
    }

    public function showDetail(Order $order): View|Factory|Application
    {
        $cleaningOrder = $order->cleaningOrder;
        $marketOrder = $order->marketOrder;
        return view('order.detail'
            , [
                'order' => $order,
                'cleaningOrder' => $cleaningOrder,
                'marketOrder' => $marketOrder
            ]);
    }

    public function showComplainCustomer(): View|Factory|Application
    {
        $complaints = Complaint::whereHas('complaintBy', function ($query) {
            $query->where('role_type', 'customer');
        })->with('complaintBy')->get();

        return view('order.complain_of_customer'
            , [
                'complaints' => $complaints
            ]);
    }

    public function showComplainCleaner(): View|Factory|Application
    {
        $complaints = Complaint::whereHas('complaintBy', function ($query) {
            $query->where('role_type', 'cleaner');
        })->with('complaintBy')->get();

        return view('order.complain_of_cleaner'
            , [
                'complaints' => $complaints
            ]);
    }

    public function showDetailComplaint(Complaint $complaint): View|Factory|Application
    {
        return view('order.complaint_detail'
            , [
                'complaint' => $complaint
            ]);
    }
}
