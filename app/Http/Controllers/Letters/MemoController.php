<?php

namespace App\Http\Controllers\Letters;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Letter;
use App\Models\LetterCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $references = Letter::all();

        $incomingLetters = collect($references)->filter(function ($letter) {
            return $letter->category->id === 1;
        });

        $outgoingLetters = collect($references)->filter(function ($letter) {
            return $letter->category->id === 2;
        });

        $memos = collect($references)->filter(function ($letter) {
            return $letter->category->id === 3;
        });

        $data = [
            'letterTypes' => $letterTypes,
            'employees' => $employees,
            'incomingLetters' => $incomingLetters,
            'outgoingLetters' => $outgoingLetters,
            'memos' => $memos,
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
            'attachments.*' => ['nullable', 'mimes:pdf'],
            'labels.*' => ['nullable'],
        ]);

        $request->merge([
            'status' => 'Draft',
        ]);

        $carbonCopy = $request->input('copy', false);

        $letter_category = LetterCategory::find($this->letterCategory);
        $destination = Employee::with('user')->find($request->input('destination'));

        $path = 'letters/' . $destination->user->name . '/' . $letter_category->name . '/attachments';

        $references = $request->input('references', false);
        $attachments = $request->file('attachments');
        $labels = $request->input('labels', false);

        $letter = new Letter($request->all());

        $letter->category()->associate($this->letterCategory);
        $letter->type()->associate($request->input('letter_type'));
        $letter->creator()->associate($request->input('creator'));
        $letter->destination()->associate($request->input('destination'));

        if ($carbonCopy) {
            $letter->carbonCopy()->associate($carbonCopy);
        }

        $letter->save();

        if ($references) {
            foreach ($references as $reference) {
                $reference = Letter::find($reference);
                $referenceRoute = 'incoming-mails.show';

                if ($reference->category->id == 1) {
                    $referenceRoute = 'incoming-mails.show';
                } elseif ($reference->category->id == 2) {
                    $referenceRoute = 'outgoing-mails.show';
                } elseif ($reference->category->id == 3) {
                    $referenceRoute = 'memo.show';
                }

                $letter->references()->create([
                    'reference_id' => $reference->id,
                    'reference_route' => $referenceRoute,
                ]);
            }
        }

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
        $letter = Letter::with([
            'type',
            'destination', 'destination.user', 'destination.job',
            'carbonCopy', 'carbonCopy.user', 'carbonCopy.job',
            'creator', 'creator.user', 'creator.job',
            'references', 'references.reference',
        ])->find($id);

        if (!$letter) {
            return abort(404);
        }

        $data = [
            'letter' => $letter,
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
        $letter = Letter::find($id);

        foreach ($letter->references()->where('file', '!=', null)->get() as $reference) {
            Storage::delete($reference->file);
        }

        $letter->delete();

        return redirect()->route('memos')->with('success', 'Berhasil menghapus e-memo.');
    }
}
