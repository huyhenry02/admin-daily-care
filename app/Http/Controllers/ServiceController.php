<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\ServiceCleaningHour;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        $services = ServiceCleaningHour::all();
        return view('service.list'
            , [
                'services' => $services
            ]);
    }

    public function showCreate(): View|Factory|Application
    {
        return view('service.create');
    }

    public function showUpdate(): View|Factory|Application
    {
        return view('service.update');
    }

    public function showDetail(): View|Factory|Application
    {
        return view('service.detail');
    }

    public function postCreate(Request $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $input = $request->all();
            $model = new ServiceCleaningHour();
            $model->fill($input);
            $model->save();
            DB::commit();
            return redirect()->route('service.showIndex');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete(ServiceCleaningHour $service): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $service->delete();
            DB::commit();
            return redirect()->route('service.showIndex');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
