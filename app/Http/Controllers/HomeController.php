<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Banner;
use App\Models\Configuration;
use App\Models\Petunjuk;
use App\Models\Timeline;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        //

        $data = [
            'banner'    => Banner::get(),
            'post'     => Post::with('category')->paginate(8),
            'content'  => 'home/home/index'
        ];
        return view('home/layouts/wrapper', $data);
    }

    function petunjuk()
    {
        $data = [
            'title'   => 'Petunjuk',
            'petunjuk' => Petunjuk::all(),
            'content'  => 'home/home/petunjuk'
        ];
        return view('home/layouts/wrapper', $data);
    }

    function timeline()
    {
        $data = [
            'timeline' => Timeline::all(),
            'content'  => 'home/home/timeline'
        ];
        return view('home/layouts/wrapper', $data);
    }

    function helpdesk()
    {
        $data = [
            'helpdesk' => Configuration::first(),
            'content'  => 'home/home/helpdesk'
        ];
        return view('home/layouts/wrapper', $data);
    }
}
