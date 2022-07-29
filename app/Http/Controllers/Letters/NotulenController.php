<?php

namespace App\Http\Controllers\Letters;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\JobLevel;
use App\Models\Letter;
use App\Models\LetterCategory;
use App\Models\Meeting;
use Illuminate\Http\Request;

class NotulenController extends Controller
{
    private $letterCategory = 4;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $letters = LetterCategory::find($this->letterCategory)->letters()->with([
            'meeting', 'creator', 'creator.user'
        ])->orderBy('id', 'DESC')->get();

        $data = [
            'letters' => $letters,
        ];

        return view('letters.notulen.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::with(['user', 'job'])->get();
        $meetings = Meeting::orderBy('id', 'DESC')->get();
        $directors = JobLevel::find(1)->employees()->with(['user', 'job'])->get();

        $data = [
            'employees' => $employees,
            'directors' => $directors,
            'meetings' => $meetings,
            'currentDate' => date('Y-m-d'),
        ];

        return view('letters.notulen.create', $data);
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
            'note_title' => ['required'],
            'date_of_letter' => ['required'],
            'creator' => ['required'],
            'meeting' => ['required'],
            'checkers' => ['required'],
            'message' => ['required'],
        ]);

        $request->merge([
            'status' => 'Draft',
        ]);

        $letter = new Letter($request->all());

        $letter->category()->associate($this->letterCategory);
        $letter->creator()->associate($request->input('creator'));
        $letter->meeting()->associate($request->input('meeting'));

        $letter->save();

        $letter->checkers()->attach($request->input('checkers'));

        return redirect()->route('notulens')->with('success', 'Berhasil manambahkan notulen.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $letter = Letter::with([
            'checkers', 'checkers.user', 'checkers.job',
            'creator', 'creator.user', 'creator.job',
            'meeting', 'meeting.members',
        ])->find($id);

        if (!$letter) {
            return abort(404);
        }

        $data = [
            'letter' => $letter,
        ];

        return view('letters.notulen.detail', $data);
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
        Letter::find($id)->delete();

        return redirect()->route('notulens')->with('success', 'Berhasil menghapus notulen.');
    }
}
