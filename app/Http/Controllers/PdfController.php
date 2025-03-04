<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Action; 
use App\Models\User;

class PdfController extends Controller
{
    public function generarPDF()
    {
        $actions = Action::all(); 
        $users = User::all();

        $pdf = Pdf::loadView('pdf.acciones', compact('actions','users')); 
        return $pdf->stream('acciones.pdf'); 
    }
}


