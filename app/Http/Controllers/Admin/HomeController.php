<?php

namespace App\Http\Controllers\Admin;

use App\Helper\BreadcrumbsRegister;
use App\Models\Module;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->count();
        $roles = Role::all()->count();
        $modules = Module::all()->count();
        BreadcrumbsRegister::Register();
        return view('admin.home')->with(['users' => $users, 'roles' => $roles, 'modules' => $modules]);
    }
}
