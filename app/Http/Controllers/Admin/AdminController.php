<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $jobs = Job::all();

        return view('master.jobs.index', compact('jobs'));
    }
}
