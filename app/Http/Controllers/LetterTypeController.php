<?php

namespace App\Http\Controllers;

use App\Models\LetterType; 
use Illuminate\Http\Request;

class LetterTypeController extends Controller
{
   
    public function index()
    {
        $lettertypes = LetterType::all(); 
        return view('lettertype.index', compact('lettertypes'));
    }

  
    public function create()
    {
        return view('lettertype.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'letter_code' => 'required|max:5',
            'name_type' => 'required',
        ]);

        // $password = substr($request->email, 0 ,3) . substr($request->name, 0, 3);
        // $role = 'staff';

        LetterType::create([
            'letter_code' => $request->letter_code,
            'name_type' => $request->name_type,
        ]);

        return redirect()->route('lettertype.index')->with('success','Berhasil Menambahkan Surat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
   
     
    }
    public function edit(string $id){
        $lettertypes = LetterType::find($id);

        return view('lettertype.edit', compact('lettertypes'));
    }

    
    public function update(Request $request, $id)
    {
        $lettertype = LetterType::find($id);
    
        if (!$lettertype) {
            return redirect()->route('lettertype.index')->with('error', 'Data surat tidak ditemukan.');
        }
    
        $request->validate([
            'letter_code' => 'required|max:5',
            'name_type' => 'required',
        ]);
    
        $lettertype->update([
            'letter_code' => $request->letter_code,
            'name_type' => $request->name_type,
        ]);
    
        return redirect()->route('lettertype.index')->with('success', 'Berhasil Mengubah Data Surat!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        LetterType::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil Menghapus Data!');
    }
}
