<?php

namespace App\Http\Controllers\adviser;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdviserHomeController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        return view('adviser.home');
    }
     
}
