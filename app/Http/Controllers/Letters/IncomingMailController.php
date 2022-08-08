<?php

namespace App\Http\Controllers\Letters;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Letter;
use App\Models\LetterCategory;
use App\Models\LetterType;
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
        $letters = LetterCategory::find($this->letterCategory)->letters()->orderBy('id', 'DESC')->get();

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
            'attachement' => ['file'],
        ]);


        $letter_category = LetterCategory::find($this->letterCategory);
        $destination = Employee::with('user')->find($request->input('destination'));
        $copy = $request->input('copy', false);

        $path = 'letters/' . $destination->user->name . '/' . $letter_category->name . '/attachments';

        $attachment = $request->file('attachment');
        $attachment = $attachment->storeAs($path, $attachment->getClientOriginalName(), 'public');

        $letter = new Letter($request->all());

        $letter->category()->associate($this->letterCategory);
        $letter->type()->associate($request->input('letter_type'));
        $letter->destination()->associate($destination);
        $letter->attachment = $attachment;

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
        $letter = Letter::with([
            'type', 'destination', 'destination.user',
            'destination.job', 'carbonCopy', 'carbonCopy.user',
            'carbonCopy.job',
        ])->find($id);

        if (!$letter) {
            return abort(404);
        }

        $data = [
            'letter' => $letter,
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
