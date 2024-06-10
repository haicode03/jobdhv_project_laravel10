<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Job;
use App\Models\Resume;
use App\Models\User;
use App\Notifications\ApplicationApproved;

class ApplicationsController extends Controller
{
    public function index()
    {
        $applications = Application::all();
        $jobs = Job::all();
        $resumes = Resume::all();
        $users = User::all();


        return view('admin/applications/index', [
            'applications' => $applications,
            'resumes' => $resumes,
            'jobs' => $jobs,
            'users' => $users,
        ]);
    }
    
    public function destroy(string $id)
    {
        $applications = Application::findOrFail($id);
 
        $applications->delete();
 
        return redirect()->route('admin/applications/index')->with('success', 'Xóa thành công');
    }

    public function approve($id)
    {
        $application = Application::findOrFail($id);

        $application->status = 'approved';
        $application->save();

        $application->user->notify(new ApplicationApproved($application));

        return redirect()->back()->with('success', 'Đơn ứng tuyển đã được duyệt.');
    }
}
