<?php

namespace App\Http\Controllers\Frontend;

use App\Contracts\Controller;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home');
    }
}
