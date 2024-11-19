<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        $customers = User::where('role_type', User::ROLE_CUSTOMER)->get();
        return view('customer.list'
            , [
                'customers' => $customers
            ]);
    }

    public function showCreate(): View|Factory|Application
    {
        return view('customer.create');
    }

    public function showUpdate(): View|Factory|Application
    {
        return view('customer.update');
    }

    public function showDetail(User $customer): View|Factory|Application
    {
        return view('customer.detail',
            [
                'customer' => $customer
            ]);
    }
}
