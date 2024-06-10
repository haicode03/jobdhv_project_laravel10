<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Category;
use App\Models\Job_type;
use App\Models\Location;
use App\Models\Application;
use App\Models\Resume;
use App\Rules\Uppercase;
use App\Http\Requests\CreateValidationRequest;
use App\Models\Detail_job;

class JobsController extends Controller
{
    public function index() {
        $job_types = Job_type::all();
        $categories = Category::take(8)->get();
        $locations = Location::all();
        $jobs = Job::where('is_approved', true)->get();

        return view('jobs/index', 
        [
            'categories' => $categories,
            'locations' => $locations,
            'jobs' => $jobs,
            'job_types' => $job_types,
        ]);
    }

    public function show($id)
    {
        $job_types = Job_type::all();
        $jobs = Job::findOrFail($id);
        $detail_jobs = Detail_job::all();
        $categories = Category::take(8)->get();
        $locations = Location::all();

        return view('jobs/show', compact('job_types', 'jobs', 'categories', 'locations'));
    }

    public function apply(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'cv' => 'required|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'nullable|string',
        ]);

        $user = auth()->user();

        $resume = Resume::firstOrNew(['user_id' => $user->id]);
        if ($request->hasFile('cv')) {
            $cvName = time().'.'.$request->cv->extension();
            $request->cv->move(public_path('cv'), $cvName);
            $resume->file_path = $cvName;
            $resume->save();
        }

        $application = new Application();
        $application->user_id = $user->id;
        $application->job_id = $request->job_id;
        $application->cover_letter = $request->cover_letter;
        $application->save();

        return redirect()->back()->with('success', 'CV đã được gửi thành công. Cảm ơn bạn đã ứng tuyển!');
    }
}