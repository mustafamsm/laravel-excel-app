<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Exports\UserIdExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users=User::query()
        ->when($request->search,function($query,$search){
            $query->where('name','LIKE',"%{$search}%");
        })->get();



        return Inertia::render('users/Index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function export($ids = null)
    { 
       
     
        if ($ids) {
            $data = explode(',', $ids);
            return Excel::download(new UserIdExport($data), 'users.xlsx');
        }
        return  Excel::download(new UsersExport, 'users.xlsx');
    }
    public function storeExcel()
    {
        return Excel::store(new UsersExport, 'users.xlsx', 'public');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);
        // Storage::disk('public')->put('users.xlsx', $request->file);
        Excel::import(new UsersImport, $request->file);
    }
}
