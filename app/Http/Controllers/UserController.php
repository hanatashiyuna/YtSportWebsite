<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('permission:edit articles', ['only' => ['index', 'show', 'edit']]);
    //     $this->middleware('permission:add articles', ['only' => ['index', 'store']]);
    //     $this->middleware('permission:delete articles', ['only' => ['index', 'destroy']]);
    //     $this->middleware('permission:publish articles', ['only' => ['index']]);
    // }

    public function index()
    {
        //Role::create(['name' => 'admin']);
        // Permission::create(['name' => 'edit articles']);
        // Permission::create(['name' => 'add articles']);
        // Permission::create(['name' => 'delete articles']);
        // Permission::create(['name' => 'publish articles']);
        // $role = Role::find(2);
        // $permission = Permission::find(1);
        //$Role->givePermissionTo($permission);
        //$permission->assignRole($role);
        //auth()->user()->assignRole(['writer','editer','publisher']);
        $users = User::all();
        $role = Role::all();
        return view('admin.user.index')->with(compact('users', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.user.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function insert_roles(Request $request, $id)
    {
        return view('admin.user.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
