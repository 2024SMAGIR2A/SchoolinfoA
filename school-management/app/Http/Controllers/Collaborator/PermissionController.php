<?php

namespace App\Http\Controllers\Collaborator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function index(request $request)
    {
        $data = Permission::orderBy('id', 'DESC')->get();
        return view('collaborators.permissions.index', compact('data'));
    }

    public function create()
    {
        return view('collaborators.permissions.form');
    }

    public function store(request $dat)
    {

        $this->validate($dat, [
            'name' => 'required|string|unique:permissions,name',
        ]);

        Permission::create(['name' => $dat->name]);

        return redirect()->route('collaborators.permissions.index');
    }
}
