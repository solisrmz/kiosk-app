<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        $users = User::paginate(10);
        return view('admin.home', compact('users'));
    }

    public function createUser(){
        return view('admin.usermanagement.create-user');
    }
}
