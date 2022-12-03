<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeBeritaController extends Controller
{
    //
    function index()
    {

        $post = Post::orderBy('created_at', 'desc')->paginate(5);
        $data = [
            'post'          => $post,
            'content'       => 'home/berita/index'
        ];
        return view('home/layouts/wrapper', $data);
    }

    function show($id)
    {
        $post = Post::find($id);
        $data = [
            'post'          => $post,
            'content'       => 'home/berita/show'
        ];
        return view('home/layouts/wrapper', $data);
    }
}
