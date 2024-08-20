<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Service;
use App\Models\About;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $services = Service::all();
        $auth = Auth::user();
        $vision = About::latest()->paginate(1);
        $mission = About::all();
        $description = About::latest()->paginate(1);

        return view('welcome', compact('categories', 'services', 'auth', 'vision', 'mission', 'description'));
    }

    public function about(){
        $abouts = About::latest()->paginate(1);
        $mission = About::all();

            $auth = Auth::user();
            return view('about', compact('abouts', 'auth', 'mission'));
    }

    public function admin(){
        return view('admin/index');
    }
}
