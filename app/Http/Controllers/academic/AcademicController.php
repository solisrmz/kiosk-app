<?php

namespace App\Http\Controllers\academic;

use App\Http\Controllers\Controller;
class AcademicController extends Controller
{
    public function index(){
        return view('academic.home');
    }
}
