<?php

namespace Modules\Categories\App\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function all()
    {
        return 'Hola';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories::create');
    }
}
