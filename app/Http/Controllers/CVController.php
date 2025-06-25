<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class CVController extends Controller
{
    public function show() {
        $user = Auth::user();
        return view('cv.show', compact('user'));
    }

    public function download() {
        $user = Auth::user();
        $pdf = Pdf::loadView('cv.show', compact('user'));
        return $pdf->download('cv.pdf');
    }
}
