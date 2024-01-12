<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\letter;
use Illuminate\Http\Request;
use App\Models\letter_type;

class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = letter::with('letterType');

        $letters = $query->paginate(2);
        return view('letter.index',  compact('letters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $letters = letter_type::all();
        $users = User::all();
        return view('letter.create',compact('letters','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           
            'letter_perihal' => 'required',
            'letter_type_id' => 'required',
            'content' => 'required',
            'recipients' => 'required|array',
            'notulis' => 'required',
        ]);
    
        $letter = Letter::create([
            'letter_perihal' => $request->letter_perihal,
            'letter_type_id' => $request->letter_type_id,
            'content' => $request->content,
            'recipients' => json_encode($request->recipients),
            'notulis' => $request->notulis,
        ]);
    
        return redirect()->route('letter.home')->with('success', 'Berhasil menambahkan Data!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(letter $letter)
    {
        $letters = Letter::findOrFail($id);
        $users = User::all();
        $letter_type = $letters->letter_type;

        return view('letter.index', compact('letters','users', 'letter_type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(letter $letter)
    {
        $letter = Letter::findOrFail($id);
        $letters = letter_type::all();
        $users = User::all();

        return view('letter.edit', compact('letter', 'letters','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, letter $letter)
    {
        $request->validate([
            // ... validasi lainnya ...
            'letter_perihal' => 'required',
            'letter_type_id' => 'required',
            'content' => 'required',
            'recipients' => 'required|array',
            'notulis' => 'required',
        ]);

        $letter = Letter::findOrFail($id);

        // Update data surat dengan informasi yang baru
        $letter->update([
            'letter_perihal' => $request->letter_perihal,
            'letter_type_id' => $request->letter_type_id,
            'content' => $request->content,
            'recipients' => json_encode($request->recipients),
            'notulis' => $request->notulis,
        ]);

        return redirect()->route('letter.home')->with('success','Berhasil memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(letter $letter)
    {
        Letter::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
}
