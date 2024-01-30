<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Auth;

class AdminBlogController extends Controller
{
    public function index()
    {
        $list = Blog::all();
        return view('admin.blog.index', [
            'list' => $list
        ]);
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {

        $wpis = new Blog();
        $wpis->title = $request->title;
        $wpis->content = $request->content;
        $wpis->author = Auth::user()->id;
        $wpis->save();

        return redirect('admin/blog');
    }

    public function edit(string $id)
    {
        $wpis = Blog::find($id);
        return view('admin.blog.edit', [
            'wpis' => $wpis
        ]);
    }

    public function update(Request $request)
    {

        $wpis = Blog::find($request->id);
        $wpis->title = $request->title;
        $wpis->content = $request->content;
        $wpis->author = Auth::user()->id;
        $wpis->save();

        return redirect('admin/blog');
    }
}
