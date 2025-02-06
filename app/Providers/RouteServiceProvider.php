<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class RouteServiceProvider extends EventServiceProvider
{
    public const HOME = 'posts.index'; // Redirect to the named route after login
    // OR
    // public const HOME = '/posts'; // Redirect to the URL directly

    // Other methods...
}
