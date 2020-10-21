<?php

namespace App\Http\Controllers\Frontend;

use App\Contracts\Controller;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index() :Response
    {
        return Inertia::render('Home');
    }
}
