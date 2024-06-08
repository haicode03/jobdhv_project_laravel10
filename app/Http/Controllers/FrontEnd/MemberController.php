<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Resume;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    // public function profile()
    // {
    //     $user = User::all();
    //     return view('member/profile', compact('user'));
    // }

    public function application()
    {
        $application = Application::all();
        $job = Job::all();
        $resume = Resume::all();
        $user = User::all();


        return view('member/application', [
            'application' => $application,
            'resume' => $resume,
            'job' => $job,
            'user' => $user,
        ]);
    }

    public function showResume($user_id)
    {
        $user = User::findOrFail($user_id);
    
        if (!$user->resume) {
            abort(404);
        }
    
        $resumeContent = Storage::get($user->resume);
    
        return response()->make($resumeContent, 200, [
            'Content-Type' => 'resume/pdf', // Thay 'application/pdf' bằng kiểu MIME của tệp tin CV
        ]);
    }
}
