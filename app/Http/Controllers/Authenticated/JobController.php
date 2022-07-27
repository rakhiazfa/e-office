<?php

namespace App\Http\Controllers\Authenticated;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobLevel;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobLevels = JobLevel::with('parent', 'jobs', 'jobs.parent')->get();

        $data = [
            'jobLevels' => $jobLevels,
        ];

        return view('jobs.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'jobLevels' => JobLevel::all(),
        ];

        return view('jobs.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'job_level' => ['required'],
            'name' => ['required'],
        ]);

        $job_id = $request->input('job_id', false);

        $job = new Job(['name' => $request->input('name')]);
        $job->jobLevel()->associate($request->input('job_level'));

        if ($job_id) {
            $job->parent()->associate($job_id);
        }

        $job->save();

        return redirect()->route('jobs.create')->with('success', 'Berhasil manambahkan data jabatan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'jobLevels' => JobLevel::all(),
            'job' => Job::with('jobLevel', 'parent')->find($id),
        ];

        return view('jobs.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'job_level' => ['required'],
            'name' => ['required'],
        ]);

        $job_id = $request->input('job_id', false);
        $job = Job::find($id);

        $job->name = $request->input('name');
        $job->jobLevel()->associate($request->input('job_level'));

        if ($job_id) {
            $job->parent()->associate($job_id);
        }

        $job->save();

        return redirect()->route('jobs')->with('success', 'Berhasil mengubah data jabatan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Job::find($id)->delete();

        return redirect()->route('jobs')->with('success', 'Berhasil menghapus data jabatan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getJobsByJobLevel($id)
    {
        $jobs = JobLevel::find($id)->jobs;

        return response()->json($jobs);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getSuperiorsByJob($id)
    {
        $jobs = [];

        $job = Job::find($id)->parent()->with('employees', 'employees.user')->first();

        while ($job !== null) {
            array_push($jobs, $job);

            $job = $job->parent()->with('employees', 'employees.user')->first();
        }

        return response()->json($jobs);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getParentJobsByJobLevel($id)
    {
        $jobs = JobLevel::find($id)->parent()->with('jobs')->first();

        return response()->json($jobs);
    }
}
