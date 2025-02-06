<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the user's profile.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $user = Auth::user(); // Get the authenticated user

        if (!$user) {
            abort(403, 'Unauthorized access.'); // Ensure the user is logged in
        }

        return view('profile.show', compact('user')); // Return the profile.show view
    }
}
