<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Cleaner;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\View\Factory;

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
        $contracts = Contract::all();
        return view('cleaner.list-contract'
            , [
                'contracts' => $contracts
            ]);
    }

    public function showCreate(): View|Factory|Application
    {
        return view('cleaner.create');
    }

    public function showUpdate(Cleaner $cleaner): View|Factory|Application
    {
        return view('cleaner.update',
            [
                'cleaner' => $cleaner
            ]);
    }

    public function showDetail(Cleaner $cleaner): View|Factory|Application
    {
        return view('cleaner.detail',
            [
                'cleaner' => $cleaner
            ]);
    }

    public function postCreate(Request $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $input = $request->all();
            $input['role_type'] = User::ROLE_CLEANER;
            $input['password'] = bcrypt($input['password']);
            $user = new User();
            $user->fill($input);
            $user->save();

            $input['user_id'] = $user->id;
            $cleaner = new Cleaner();
            $cleaner->fill($input);
            $cleaner->save();

            if ($request->hasFile('cv_file')) {
                $cleaner->cv_file = $this->handleUploadFile($request->file('cv_file'), $cleaner, 'FILE_CV');
                $cleaner->save();
            }

            DB::commit();
            return redirect()->route('cleaner.showIndex');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function putEditCleaner(Cleaner $cleaner, Request $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $input = $request->all();
            $user = $cleaner->user;
            $user->fill($input);
            $user->save();

            $input['user_id'] = $user->id;
            $cleaner->fill($input);
            $cleaner->save();

            if ($request->hasFile('cv_file')) {
                $cleaner->cv_file = $this->handleUploadFile($request->file('cv_file'), $cleaner, 'FILE_CV');
                $cleaner->save();
            }

            DB::commit();
            return redirect()->route('cleaner.showIndex');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function postCreateContract(Request $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $input = $request->all();
            $contract = new Contract();
            $contract->fill($input);
            $contract->save();

            if ($request->hasFile('attachment_file')) {
                $contract->attachment_file = $this->handleUploadFile($request->file('attachment_file'), $contract, 'FILE_CONTRACT');
                $contract->save();
            }
            DB::commit();
            return redirect()->back()->with('success', 'Create contract successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    private function handleUploadFile($file, $model, $folderName): string
    {
        $fileName = $folderName . '_' . $model->id . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storePubliclyAs('files/' . $folderName, $fileName);
        return asset('storage/' . $filePath);
    }


    public function putEditContract(Request $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $input = $request->all();
            $contract = Contract::find($input['contract_id']);
            $contract->fill($input);
            $contract->save();

            if ($request->hasFile('attachment_file')) {
                $contract->attachment_file = $this->handleUploadFile($request->file('attachment_file'), $contract, 'FILE_CONTRACT');
                $contract->save();
            }
            DB::commit();
            return redirect()->back()->with('success', 'Create contract successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function deleteContract(Contract $contract): RedirectResponse
    {
        try{
            $contract->delete();
            return redirect()->back()->with('success', 'Delete contract successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
