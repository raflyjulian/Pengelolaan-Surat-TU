<?php

namespace App\Http\Controllers;

use App\Models\letter;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $letter = letter::orderBy('letter_perihal', 'ASC')->simplePaginate(5);
        return view('letter.index',  compact('letters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('letter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'letter_perihal' => 'required',
            'recipients' => 'required',
            'content' => 'required',
            'attachment' => 'required',
            'notulis' => 'required',
        ],[
            'letter_perihal.required' => 'Perihal Surat wajib di isi',
            'recepients' => 'penerima wajib di pilih',
            'content' => 'isi surat wajib di isi',
            'attachment' => 'lampiran wajib di isi',
            'notulis' => 'notulis wajib di isi'
        ]
    );
    
        Letter::create([
            'letter_perihal' => $request->letter_perihal,
            'recepients' => $request->recepients,
            'content' => $request->content,
            'attachment' => $request->attachment,
            'notulis' => $request->notulis,
        ]);
    
        return redirect()->route('letter.home')->with('success', 'Berhasil menambahkan Data!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(letter $letter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(letter $letter)
    {
        $letter = letter::find($id);

        return view('letter.edit', compact('letter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, letter $letter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(letter $letter)
    {
        //
    }
}
