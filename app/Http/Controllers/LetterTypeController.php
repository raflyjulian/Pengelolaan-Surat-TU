<?php

namespace App\Http\Controllers;

use App\Models\letter_type;
use Illuminate\Http\Request;

class LetterTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $letter_types = letter_type::orderBy('name_type', 'ASC')->simplePaginate(5);
        return view('letter_type.index',  compact('letter_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('letter_type.create');
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'name_type' => 'required',
        ],
    );

    $hcount = letter_type::count();

    $letter_code = $request->letter_code . '-' . ($hcount + 1);
    
        letter_type::create([
            'letter_code' => $letter_code,
            'name_type' => $request->name_type,
        ]);
    
        return redirect()->route('letter_type.home')->with('success', 'Berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(letter_type $letter_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $letter_type = letter_type::find($id);

        return view('letter_type.edit', compact('letter_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'letter_code' => 'required',
            'name_type' => 'required',
        ]);
    
        letter_type::where('id', $id)->update([
            'letter_code' => $request->letter_code,
            'name_type' => $request->name_type,
        ]);
    
        return redirect()->route('letter_type.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        letter_type::where('id', $id)->delete();

        return redirect()->back()->with('delete', 'Berhasil menghapus data');
    }
}
