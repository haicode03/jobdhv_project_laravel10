<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateValidationRequest;
use App\Models\Job;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job_type;
use App\Models\Location;
use App\Models\Detail_job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $job = Job::orderBy('created_at', 'DESC')->get();
        // $job = Job::where('is_approved', true)->get();
 
        return view('admin/jobs/index', compact('job'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        $category = Category::all();
        $job = Job::all();
        $location = Location::all();
        $job_type = Job_type::all();
        $company = Company::all();
        return view('admin/jobs/create', compact('category', 'job', 'company', 'job_type', 'location'));
    }

    public function store(CreateValidationRequest $request) {
        $request->validate([
            'title' => 'required',
            'wage' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'company_id' => 'required|exists:companies,id',
            'location_id' => 'required|exists:locations,id',
            'job_type_id' => 'required|exists:job_types,id',
            'is_approved' => 'sometimes|boolean',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);
    
        $generatedImageName = 'image'.time().'_'.$request->title.'.'.$request->image->extension();
    
        $request->image->move(public_path('images'), $generatedImageName);
    
        $job = Job::create([
            'title' => $request->input('title'),
            'wage' => $request->input('wage'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category_id'),
            'company_id' => $request->input('company_id'),
            'location_id' => $request->input('location_id'),
            'job_type_id' => $request->input('job_type_id'),
            'is_approved' => $request->input('is_approved', 0),
            'image_path' => $generatedImageName
        ]);
    
        // Flash success message to session
        session()->flash('success', 'Công việc đã được tạo thành công!');
    
        // Redirect to the jobs index page
        return redirect()->route('admin/jobs/index');
    }
    
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = Job::findOrFail($id);
        $detailJob = Detail_Job::where('job_id', $id)->first();

        return view('admin/jobs/show', compact('job', 'detailJob'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $job = Job::findOrFail($id);
        $category = Category::all();
        $company = Company::all();
        $location = Location::all();
        $job_type = Job_Type::all();
    
        return view('admin/jobs/edit', compact('job', 'category', 'company', 'location', 'job_type'));
    }
    
    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required',
            'wage' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'company_id' => 'required|exists:companies,id',
            'location_id' => 'required|exists:locations,id',
            'job_type_id' => 'required|exists:job_types,id',
            'is_approved' => 'sometimes|boolean',
            'image' => 'nullable|mimes:jpg,png,jpeg|max:5048'
        ]);
    
        $job = Job::findOrFail($id);
    
        $job->title = $request->input('title');
        $job->wage = $request->input('wage');
        $job->description = $request->input('description');
        $job->category_id = $request->input('category_id');
        $job->company_id = $request->input('company_id');
        $job->location_id = $request->input('location_id');
        $job->job_type_id = $request->input('job_type_id');
        $job->is_approved = $request->input('is_approved', 0);
    
        if ($request->hasFile('image')) {
            $generatedImageName = 'image'.time().'_'.$request->title.'.'.$request->image->extension();
            $request->image->move(public_path('images'), $generatedImageName);
            $job->image_path = $generatedImageName;
        }
    
        $job->save();
    
        session()->flash('success', 'Công việc đã được cập nhật thành công!');
    
        return redirect()->route('admin/jobs/index');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $job = Job::findOrFail($id);
 
        $job->delete();
 
        return redirect()->route('admin/jobs/index')->with('success', 'Xóa thành công');
    }
}
