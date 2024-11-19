<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

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

    public function showDetail(): View|Factory|Application
    {
        return view('order.detail');
    }
}
