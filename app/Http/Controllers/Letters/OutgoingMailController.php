<?php

namespace App\Http\Controllers\Letters;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use App\Models\JobLevel;
use App\Models\Letter;
use App\Models\LetterCategory;
use Illuminate\Http\Request;

class OutgoingMailController extends Controller
{
    private $letterCategory = 2;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $letters = LetterCategory::find($this->letterCategory)->letters()->with([
            'company', 'creator', 'creator.user'
        ])->get();

        $data = [
            'letters' => $letters,
        ];

        return view('letters.outgoing-mail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $letterTypes = LetterCategory::find($this->letterCategory)->letterTypes;
        $divisions = JobLevel::find(2)->jobs;
        $companies = Company::all();
        $directors = JobLevel::find(1)->employees()->with(['user', 'job'])->get();

        $data = [
            'letterTypes' => $letterTypes,
            'divisions' => $divisions,
            'companies' => $companies,
            'directors' => $directors,
            'currentDate' => date('Y-m-d'),
        ];

        return view('letters.outgoing-mail.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());

        $request->validate([
            'letter_type' => ['required'],
            'date_of_letter' => ['required'],
            'sender' => ['required'],
            'department' => ['required'],
            'creator' => ['required'],
            'regarding' => ['required'],
            'company' => ['required'],
            'recipient_name' => ['required'],
            'checker' => ['required'],
        ]);

        $request->merge([
            'letter_number' => 'BS/02/KKB/01',
            'status' => 'Draft',
        ]);

        $letter = new Letter($request->all());

        $letter->category()->associate($this->letterCategory);
        $letter->type()->associate($request->input('letter_type'));
        $letter->creator()->associate($request->input('creator'));
        $letter->company()->associate($request->input('company'));
        $letter->checker()->associate($request->input('checker'));

        $letter->save();

        return redirect()->route('outgoing-mails')->with('success', 'Berhasil manambahkan surat keluar.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'letter' => Letter::with([
                'type', 'company',
            ])->find($id),
        ];

        return view('letters.outgoing-mail.detail', $data);
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

        return redirect()->route('outgoing-mails')->with('success', 'Berhasil menghapus surat keluar.');
    }
}
