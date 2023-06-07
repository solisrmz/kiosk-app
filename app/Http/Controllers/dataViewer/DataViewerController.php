<?php

namespace App\Http\Controllers\dataViewer;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Grupo;
use App\Models\Idioma;
use App\Models\Plantel;
use Illuminate\Http\Request;
use PHPUnit\Metadata\Group;

class DataViewerController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        return view('dataViewer.home');
    }

    public function studentsList() {
        $students = [];
        return view('dataViewer.students.students-list', compact('students'));
    }

    public function groupsList(){
        $languages = Idioma::all();
        $campus = Plantel::all();
        $groups = [];
        return view('dataViewer.groups.groups-list', compact('groups','languages', 'campus'));
    }

}
