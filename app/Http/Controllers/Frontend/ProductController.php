<?php

namespace App\Http\Controllers\Frontend;

use App\Contracts\Controller;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Products/Index');
    }

    public function show(): Response
    {
        return Inertia::render('Products/Product');
    }
}
