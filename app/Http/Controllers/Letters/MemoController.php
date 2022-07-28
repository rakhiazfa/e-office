<?php

namespace App\Http\Controllers\Letters;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Letter;
use App\Models\LetterCategory;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    private $letterCategory = 3;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $letters = LetterCategory::find($this->letterCategory)->letters()->with([
            'creator', 'creator.user',
            'destination', 'destination.user',
        ])->orderBy('id', 'DESC')->get();

        $data = [
            'letters' => $letters,
        ];

        return view('letters.memo.index', $data);
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

        return view('letters.memo.create', $data);
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
            'date_of_letter' => ['required'],
            'letter_type' => ['required'],
            'creator' => ['required'],
            'destination' => ['required'],
            'regarding' => ['required'],
            'message' => ['required'],
        ]);

        $request->merge([
            'status' => 'Draft',
        ]);

        $carbonCopy = $request->input('copy', false);

        $letter = new Letter($request->all());

        $letter->category()->associate($this->letterCategory);
        $letter->type()->associate($request->input('letter_type'));
        $letter->creator()->associate($request->input('creator'));
        $letter->destination()->associate($request->input('destination'));

        if ($carbonCopy) {
            $letter->carbonCopy()->associate($carbonCopy);
        }

        $letter->save();

        return redirect()->route('memos')->with('success', 'Berhasil menambahkan e-memo.');
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
                'type',
                'destination', 'destination.user', 'destination.job',
                'carbonCopy', 'carbonCopy.user', 'carbonCopy.job',
                'creator', 'creator.user', 'creator.job'
            ])->find($id),
        ];

        return view('letters.memo.detail', $data);
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

        return redirect()->route('memos')->with('success', 'Berhasil menghapus e-memo.');
    }
}
