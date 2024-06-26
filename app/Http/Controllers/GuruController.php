<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role','guru')->get();
        // $user = User::where('role', 'staff')->get();
        return view('guru.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi  data yang di inpuut
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
        ]);

        $password = substr($request->email, 0 ,3) . substr($request->name, 0, 3);
        

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  Hash::make($password),
            'role' => 'guru',
        ]);
        return redirect()->route('guru.index')->with('success', 'Berhasil menambah data');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $user = User::find($id);

        return view('guru.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $user = User::find($id);

        if (!$user) {
        return redirect()->route('guru.index')->with('error', 'Akun tidak ditemukan.');
        }

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        if ($request->password) {
             // $password = substr($request->email, 0, 3).substr($request->name, 0, 3);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
         ]);
        } else {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
    ]);
}
        return redirect()->route('guru.index')->with('success','Berhasil Mengubah Data Guru!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil Menghapus Data!');
    }

}
