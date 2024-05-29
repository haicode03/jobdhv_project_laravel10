<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Category;
use App\Rules\Uppercase;
use App\Http\Requests\CreateValidationRequest;

class JobsController extends Controller
{
    public function index() {
        $jobs = Job::all();  //SELECT * FROM jobs;
        return view('jobs.index', [
            'jobs' => $jobs,
        ]);
    }

    public function create() 
    {
        $categories_job = Category::all();
        return view('jobs.create')->with('categories_job', $categories_job);
    }

    public function store(CreateValidationRequest $request) {
        // dd($request->all());
        // dd($request->file('image')->isValid());
        $request->validate([
            'title' => 'required',
            'wage' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $generatedImageName = 'image'.time().'_'
                                .$request->title.'.'
                                .$request->image->extension();

        //move to a folder
        $request->image->move(public_path('images'), $generatedImageName);

        // dd($generatedImageName);

        // dd('This is store function');
        // $job = new Job();
        // $job->title = $request->input('title');
        // $job->wage = $request->input('wage');
        // $job->description = $request->input('description');
        // $request->validated();
        // $request->validate([
        //     // 'title' => 'required|unique:jobs',
        //     'title' => new Uppercase,
        //     'wage' => 'required',
        //     'category_id' => 'required',
        // ]);

        $job = Job::create([
            'title' => $request->input('title'),
            'wage' => $request->input('wage'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category_id'),
            'image_path' => $generatedImageName
        ]);

        $job->save();
        return redirect('/jobs');
    }

    public function edit($id)
    {
        $job = Job::find($id);
        // dd($job);
        return view('jobs.edit')->with('job', $job);
    }

    public function update(CreateValidationRequest $request, $id)
    {
        // $request->validate([
        //     // 'title' => 'required|unique:jobs',
        //     'title' => new Uppercase,
        //     'wage' => 'required',
        //     'category_id' => 'required',
        // ]);
        $request->validated();
        $job = Job::where('id', $id)
                ->update([
                    'title' => $request->input('title'),
                    'wage' => $request->input('wage'),
                    'description' => $request->input('description'),
                ]);
        return redirect('/jobs');
    }

    public function destroy($id)
    {
        // dd($id);
        $job = Job::find($id);
        $job->delete();
        return redirect('/jobs');
    }

    public function show($id)
    {
        // dd('This is show function'.$id);
        $job = Job::find($id);
        $category = Category::find($job->category_id);
        $job->category = $category;
        // dd($job);
        return view('jobs.show')->with('job', $job);
    }

}