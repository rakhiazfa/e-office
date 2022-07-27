<?php

namespace App\Http\Controllers\Authenticated;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Job;
use App\Models\JobLevel;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * @var array
     */
    private array $genders = [
        "Pria" => "Pria",
        "Wanita" => "Wanita",
    ];

    /**
     * @var array
     */
    private array $bloodGroups = [
        "A" => "A",
        "B" => "B",
        "AB" => "AB",
        "O" => "O",
    ];

    /**
     * @var array
     */
    private array $maritalStatus = [
        "Belum Menikah" => "Belum Menikah",
        "Menikah" => "Menikah",
        "Duda / Janda" => "Duda / Janda",
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with(['user', 'job'])->orderBy('created_at')->get();

        $data = [
            'employees' => $employees,
        ];

        return view('employee.index', $data);
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
            'genders' => $this->genders,
            'bloodGroups' => $this->bloodGroups,
            'maritalStatus' => $this->maritalStatus,
        ];

        return view('employee.create', $data);
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
            'nik' => ['required', 'unique:employees'],
            'phone' => ['required'],
            'ktp' => ['required', 'unique:employees'],
            'ktp_address' => ['required'],
            'city' => ['required'],
            'address' => ['required'],
            'job' => ['required'],
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
            'password_confirmation' => ['required', 'same:password'],
        ]);

        $job_id = $request->input('job');
        $role = Job::find($job_id)->jobLevel->role;

        $superior_id = $request->input('superior', false);

        $user = User::create($request->all());
        $user->assignRole($role);

        $employee = new Employee($request->all());
        $employee->user()->associate($user);
        $employee->job()->associate($job_id);

        if ($superior_id) {
            $employee->superior()->associate($superior_id);
        }

        $employee->save();

        return redirect()->route('employees')->with('success', 'Berhasil menambahkan karyawan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::with([
            'user', 'job', 'job.jobLevel',
            'superior', 'superior.user', 'superior.job',
            'subordinates', 'subordinates.user', 'subordinates.job',
        ])->find($id);

        $data = [
            'employee' => $employee,
        ];

        return view('employee.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('employees')->with('success', 'Berhasil menghapus karyawan.');
    }
}
