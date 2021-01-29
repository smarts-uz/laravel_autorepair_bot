<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Reviews;
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
//        $data = [
//            'category' => Category::where('name', 'like', '%Автомо%')->with(['lists', 'services', 'our_works'])->first()
//        ];

        return view('front.pages.index', $data);
        return view('welcome');
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
            'category' => Category::where('slug', $slug)->with(['lists', 'services', 'our_works'])->first()
        ];

        return view('category', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function prices()
    {
        // Get all needed data's
        $data = [
            'categories' => Category::orderBy('id', 'asc')->with(['lists', 'our_works', 'services'])->get()
        ];

        return view('front.pages.prices', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function reviews()
    {
        // Get all needed data's
        $data = [
            'reviews' => Reviews::latest()->get()
        ];

        return view('front.pages.reviews', $data);
    }

    public function saveReview(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'phone_number' => 'required|max:255',
            'message' => 'required',
        ]);

        Reviews::create($request->all());

        return redirect()->back();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function contacts()
    {
        return view('front.pages.contacts');
    }
}
