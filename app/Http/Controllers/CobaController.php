<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswas;
use Illuminate\Http\Request;

Class CobaController extends Controller
{

    public function index()
    {
        $mahasiswas = Mahasiswas::orderBy('id', 'desc')->paginate(3);

        return view('mahasiswas.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('mahasiswas.create');
    }

    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'nama_mahasiswa' => 'required|unique:mahasiswas|max:255',
            'alamat' => 'required',
            'no_telp' => 'required|numeric',
            'email' => 'required',


        ]);

        $mahasiswas = new Mahasiswas;

        $mahasiswas->nama_mahasiswa = $request->nama_mahasiswa;
        $mahasiswas->alamat = $request->alamat;
        $mahasiswas->no_telp = $request->no_telp;
        $mahasiswas->email = $request->email;


        $mahasiswas->save();

        return redirect('/');
    }
    public function show($id)
    {
        $mhs = Mahasiswas::where('id', $id)->first();
        return view('mahasiswas.show', ['mahasiswas' =>$mhs]);
    }
    public function edit($id)
    {
        $mhs = Mahasiswas::where('id', $id)->first();
        return view('mahasiswas.edit', ['mahasiswas' =>$mhs]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mahasiswa' => 'required|unique:mahasiswas|max:255',
            'alamat' => 'required',
            'no_telp' => 'required|numeric',
            'email' => 'required',

        ]);
        Mahasiswas::find($id)->update([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,

        ]);

        return redirect('/');
    }
    public function destroy($id)
    {
        Mahasiswas::find($id)->delete();
        return redirect('/');
    }
}
