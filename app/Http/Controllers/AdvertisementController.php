<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Advertisement;
use Illuminate\Support\Facades\DB;
use App\Models\ServiceCleaningHour;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        $advertisements = Advertisement::all();
        return view('advertisement.list'
            , ['advertisements' => $advertisements]);
    }

    public function showCreate(): View|Factory|Application
    {
        return view('advertisement.create');
    }

    public function showUpdate(Advertisement $advertisement): View|Factory|Application
    {
        return view('advertisement.update', ['advertisement' => $advertisement]);
    }

    public function postCreate(Request $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $input = $request->all();
            $model = new Advertisement();
            $model->fill($input);
            $model->save();
            if ($request->hasFile('image')) {
                $model->image = $this->handleUploadFile($request->file('image'), $model);
                $model->save();
            }
            DB::commit();
            return redirect()->route('advertisement.showIndex');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function putAdvertisement(Advertisement $advertisement, Request $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $input = $request->all();
            $advertisement->fill($input);
            $advertisement->save();
            if ($request->hasFile('image')) {
                $advertisement->image = $this->handleUploadFile($request->file('image'), $advertisement);
                $advertisement->save();
            }
            DB::commit();
            return redirect()->route('advertisement.showIndex');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete(Advertisement $advertisement): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $advertisement->delete();
            DB::commit();
            return redirect()->route('advertisement.showIndex');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    private function handleUploadFile($file, $model): string
    {
        $fileName = $model->type . '_' . $model->id . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storePubliclyAs('files/advertisement' , $fileName);
        return asset('storage/' . $filePath);
    }
}
