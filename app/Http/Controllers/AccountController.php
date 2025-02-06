<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Get the authenticated user

        if (!$user) {
            abort(403, 'Unauthorized access.'); // Ensure the user is logged in
        }

        try {
            // Fetch all posts created by the user
            $userPosts = Post::where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->paginate(5); // Paginate 5 posts per page
        } catch (\Exception $e) {
            \Log::error('Error fetching user posts: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while loading your posts.');
        }

        // Debugging: Log detailed information about the fetched data
        \Log::info('User Information:');
        \Log::info('ID: ' . $user->id);
        \Log::info('Name: ' . $user->name);
        \Log::info('Email: ' . $user->email);

        \Log::info('User Posts Count: ' . $userPosts->total());
        \Log::info('User Posts: ' . json_encode($userPosts->toArray()));

        // Pass data to the view
        return view('account.index', compact('user', 'userPosts'));
    }
}
