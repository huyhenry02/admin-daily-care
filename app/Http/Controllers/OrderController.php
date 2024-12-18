<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class OrderController extends Controller
{
    public function showIndex(Request $request): View|Factory|Application
    {
        $orders = Order::all();
        foreach ($orders as $order) {
            $order->is_highlighted = false;
            if ($order->service_type === Order::SERVICE_TYPE_CLEAN) {
                if ($order->status === Order::STATUS_GOING && $order->cleaningOrder->start_time < now()) {
                    $order->is_highlighted = true;
                }
            }else if ($order->status === Order::STATUS_GOING && $order->marketOrder->delivery_time < now()) {
                $order->is_highlighted = true;
            }
        }
        if ($request->has('highlighted') && $request->highlighted == true) {
            $orders = $orders->filter(fn($order) => $order->is_highlighted);
        }
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
        $complaintBy = $complaint->complaintBy;
        return view('order.complaint_detail'
            , [
                'complaint' => $complaint,
                'complaintBy' => $complaintBy
            ]);
    }

    public function confirmComplaint(Complaint $complaint, Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['status'] = Complaint::STATUS_APPROVED;
            $complaint->fill($input);
            $complaint->save();
            DB::commit();
            return redirect()->back()->with('success', 'Complaint has been confirmed');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function rejectComplaint(Complaint $complaint, Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['status'] = Complaint::STATUS_REJECTED;
            $complaint->fill($input);
            $complaint->save();
            DB::commit();
            return redirect()->back()->with('success', 'Complaint has been rejected');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
