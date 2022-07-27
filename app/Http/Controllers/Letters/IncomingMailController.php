<?php

namespace App\Http\Controllers\Letters;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Letter;
use App\Models\LetterCategory;
use Illuminate\Http\Request;

class IncomingMailController extends Controller
{
    private $letterCategory = 1;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $letters = LetterCategory::find($this->letterCategory)->letters;

        $data = [
            'letters' => $letters,
        ];

        return view('letters.incoming-mail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $letterTypes = LetterCategory::find($this->letterCategory)->letterTypes;
        $employees = Employee::with(['user', 'job'])->get();

        $data = [
            'letterTypes' => $letterTypes,
            'employees' => $employees,
        ];

        return view('letters.incoming-mail.create', $data);
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
            'letter_type' => ['required'],
            'sender_name' => ['required'],
            'regarding' => ['required'],
            'letter_number' => ['required', 'unique:letters'],
            'date_of_letter' => ['required'],
            'date_of_entry' => ['required'],
            'destination' => ['required'],
        ]);

        $copy = $request->input('copy', false);

        $letter = new Letter($request->all());

        $letter->category()->associate($this->letterCategory);
        $letter->type()->associate($request->input('letter_type'));
        $letter->destination()->associate($request->input('destination'));

        if ($copy) {
            $letter->carbonCopy()->associate($request->input('copy'));
        }

        $letter->save();

        return redirect()->route('incoming-mails')->with('success', 'Berhasil manambahkan surat masuk.');
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
                'type', 'destination', 'destination.user',
                'destination.job', 'carbonCopy', 'carbonCopy.user',
                'carbonCopy.job',
            ])->find($id),
        ];

        return view('letters.incoming-mail.detail', $data);
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

        return redirect()->route('incoming-mails')->with('success', 'Berhasil menghapus surat masuk.');
    }
}
