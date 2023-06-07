<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;
class PDFGenerateController extends Controller
{
    public function generateListReport($key){
        $data = [
            'datos' => session($key)
        ];
        switch ($key){
            case 'grupos':
                $pdf = Pdf::loadview('pdf.reports.list-report', $data);
                return $pdf->download('lista-grupos.pdf');
                break;
        }
    }
}
