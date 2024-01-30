<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $list = Blog::all();
        return view('blog.index', [
            'list' => $list
        ]);
    }
}
