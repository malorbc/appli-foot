<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return $categories;
    }
}
