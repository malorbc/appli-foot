<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('agenda', compact('category'));
    }

    public function create()
    {
        $category = Category::all();
        return view('agenda', compact('category'));
    }
}
