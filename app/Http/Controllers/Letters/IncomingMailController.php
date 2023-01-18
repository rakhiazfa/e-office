<?php

namespace App\Http\Controllers\Letters;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Letter;
use App\Models\LetterCategory;
use App\Models\LetterType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        $validate = $request->validate([
            'letter_type' => ['required'],
            'sender_name' => ['required'],
            'regarding' => ['required'],
            'letter_number' => ['required', 'unique:letters'],
            'date_of_letter' => ['required'],
            'date_of_entry' => ['required'],
            'destination' => ['required'],
            'attachments.*' => ['nullable', 'mimes:pdf'],
            'labels.*' => ['nullable'],
        ]);

        $letter_category = LetterCategory::find($this->letterCategory);
        $destination = Employee::with('user')->find($request->input('destination'));
        $copy = $request->input('copy', false);

        $path = 'letters/' . $destination->user->name . '/' . $letter_category->name . '/attachments';

        $attachments = $request->file('attachments', false);
        $labels = $request->input('labels', false);

        $letter = new Letter($request->all());

        $letter->category()->associate($this->letterCategory);
        $letter->type()->associate($request->input('letter_type'));
        $letter->destination()->associate($destination);

        if ($copy) {
            $letter->carbonCopy()->associate($request->input('copy'));
        }

        $letter->save();

        if ($attachments) {
            $index = 0;

            foreach ($attachments as $attachment) {
                $file = $attachment->storeAs($path, date('d M Y H i s') . ' - ' . $attachment->getClientOriginalName());

                $letter->references()->create([
                    'file' => $file,
                    'label' => $labels[$index] ? $labels[$index] : pathinfo($attachment->getClientOriginalName(), PATHINFO_FILENAME),
                ]);

                $index++;
            }
        }

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
            'carbonCopy.job', 'references', 'references.reference',
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
        $letter = Letter::find($id);

        foreach ($letter->references()->where('file', '!=', null)->get() as $reference) {
            Storage::delete($reference->file);
        }

        $letter->delete();

        return redirect()->route('incoming-mails')->with('success', 'Berhasil menghapus surat masuk.');
    }
}
