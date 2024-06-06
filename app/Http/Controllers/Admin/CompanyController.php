<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::orderBy('created_at', 'DESC')->get();
 
        return view('admin.company.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/company/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'Tên công ty là bắt buộc.',
        ]);
        Company::create($request->all());
 
        return redirect()->route('admin/company/index')->with('success', 'Thêm công ty thành công');
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::findOrFail($id);
 
        return view('company.show', compact('company'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::findOrFail($id);
 
        return view('admin/company/edit', compact('company'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $company = Company::findOrFail($id);
 
        $company->update($request->all());
 
        return redirect()->route('admin/company/index')->with('success', 'Cập nhật thông tin thành công');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
 
        $company->delete();
 
        return redirect()->route('admin/company/index')->with('success', 'Xóa thành công');
    }
}
