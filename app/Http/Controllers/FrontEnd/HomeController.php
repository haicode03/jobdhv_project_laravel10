<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Job;
use App\Models\Job_type;
use App\Models\Location;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $job_types = Job_type::all();
        $jobs = Job::all();
        $categories = Category::take(8)->get();
        $locations = Location::all();

        return view('home', [
            'categories' => $categories,
            'locations' => $locations,
            'jobs' => $jobs,
            'job_types' => $job_types,
    ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $category = $request->input('category');
        $location = $request->input('location');

        $query = Job::query();

        if ($keyword) {
            $query->where('title', 'LIKE', "%{$keyword}%");
        }

        if ($category) {
            $query->where('category_id', $category);
        }

        if ($location) {
            $query->where('location_id', $location);
        }

        $jobs = $query->get();

        return view('search_results', compact('jobs'));
    }

}