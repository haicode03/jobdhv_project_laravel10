<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Resume;
use App\Models\Application;
use App\Models\Job;
use App\Models\Category;
use App\Models\Location;
use App\Models\Job_type;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateValidationRequest;
use App\Notifications\ApplicationApproved;

class MemberController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile_candidate()
    {
        $user = User::with(['user_profile', 'resume'])->find(Auth::id());

        return view('member/profile_candidate', compact('user'));
    }

    // Cập nhật hồ sơ ứng viên
    // public function update($id) {
    //     $resumes = Resume::findOrFail($id);
 
    //     $resumes->update($request->all());
 
    //     return redirect()->route('member/profile_candidate')->with('success', 'Cập nhật thông tin thành công');
    // }

    public function application()
    {
        $applications = Application::all();
        $jobs = Job::all();
        $resumes = Resume::all();
        $users = User::all();


        return view('member/application', [
            'applications' => $applications,
            'resumes' => $resumes,
            'jobs' => $jobs,
            'users' => $users,
        ]);
    }

    public function index_post(){
        $jobs = Job::orderBy('created_at', 'DESC')->get();
        $jobs = Job::where('is_approved', true)->get();
        return view('member/index_post', compact('jobs'));
    }

    public function create_post() 
    {
        $categories = Category::all();
        $jobs = Job::all();
        $locations = Location::all();
        $job_types = Job_type::all();
        $companies = Company::all();
        return view('member/create_post', compact('categories', 'jobs', 'companies', 'job_types', 'locations'));
    }

    public function store_post(CreateValidationRequest $request) {
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
    
        session()->flash('success', 'Công việc đã được tạo thành công!');
    
        return redirect()->route('member/index_post');
    }

    public function notifications()
    {
        $notifications = Auth::user()->notifications;
        // dd($notifications);
        return view('member.notifications', ['notifications' => $notifications]);
    }
}
