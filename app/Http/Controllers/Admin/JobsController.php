<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $job = Job::orderBy('created_at', 'DESC')->get();
 
        return view('admin.jobs.index', compact('job'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/jobs/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ], [
            'title.required' => 'Tên công việc là bắt buộc.',
        ]);
        Job::create($request->all());
 
        return redirect()->route('admin/jobs/index')->with('success', 'Thêm công việc thành công');
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = Job::findOrFail($id);
 
        return view('jobs.show', compact('jobs'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Job::findOrFail($id);
 
        return view('admin/jobs/edit', compact('jobs'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $job = Job::findOrFail($id);
 
        $job->update($request->all());
 
        return redirect()->route('admin/jobs/index')->with('success', 'Cập nhật thông tin thành công');
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
