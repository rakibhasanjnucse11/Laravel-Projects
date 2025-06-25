<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class PortfolioController extends Controller
{
    /**
     * Show a user's portfolio with a dynamic template.
     *
     * @param string $username
     * @param string $template
     * @return \Illuminate\View\View
     */

    /**
     * Download the user's portfolio as a PDF.
     *
     * @param string $username
     * @param string $template
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function download($username, $template = 'template1')
    {
        $user = User::where('name', $username)->firstOrFail();
        $profile = $user->profile;
        $projects = $user->projects;

        if (!view()->exists("templates.$template")) {
            $template = 'template1';
        }

        $pdf = Pdf::loadView("templates.$template", [
            'profile' => $profile,
            'projects' => $projects,
            'user' => $user,
        ]);

        return $pdf->download('portfolio_'.$profile->name.'.pdf');
    }
    public function show($username)
    {
    $user = User::where('name', $username)->firstOrFail();
    $profile = $user->profile;
    $projects = $user->projects;

    return view('portfolio.show', compact('user', 'profile', 'projects'));
    }

}
