<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Main page of the website
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Get all need data's
        $data = [
            'categories' => Category::latest()->get()
        ];

        return view('welcome', $data);
    }

    /**
     * Single category web page
     *
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function category(Request $request, $slug)
    {
        // Get all needed data's
        $data = [
            'categories' => Category::latest()->get(),
            'category' => Category::where('slug', $slug)->with(['lists'])->first()
        ];

        return view('category', $data);
    }
}
