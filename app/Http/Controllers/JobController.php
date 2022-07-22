<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Company;
use App\Models\Category;
use App\Models\Industry;
use Illuminate\Http\Request;
use App\Http\Requests\JobRequest;
use App\Http\Resources\JobResource;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all();
        return view('admin.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $industries = Industry::all();
        $categories = Category::all();
        return view('admin.jobs.create', compact('companies', 'industries', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {
        Job::create($request->validated());
        return redirect()->route('admin.jobs.index')->with('message', 'Job has been added.');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        $companies = Company::all();
        $industries = Industry::all();
        $categories = Category::all();
        return view('admin.jobs.edit', compact('job', 'industries', 'categories', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobRequest $request, Job $job)
    {
        $job->update($request->validated());
        return redirect()->route('admin.jobs.index')->with('message', 'Job has been updated.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('admin.jobs.index')->with('message', 'Job has been deleted.');
    }

    public function search_jobs() {
        $jobs = Job::all();
        $categories = Category::all();
        $industries = Industry::all();
        return view('jobs', compact('jobs', 'categories', 'industries'));
    }

    public function all() {
        $jobs = Job::all();
        return JobResource::collection($jobs);
    }

    public function search() {
        $jobs = Job::latest()->filter(request(['query', 'categories', 'industries']))->paginate(5);
        return JobResource::collection($jobs);
    }
}
