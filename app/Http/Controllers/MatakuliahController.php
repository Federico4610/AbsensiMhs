<?php

namespace App\Http\Controllers;
use App\Models\Matakuliahs;
use App\Models\Mahasiswas;
use Illuminate\Http\Request;
class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matakuliahs = Matakuliahs::orderBy('id', 'desc')->paginate(3);

        return view('matakuliahs.index', compact('matakuliahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matakuliahs.create');
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
            'nama_matakuliah' => 'required|unique:matakuliahs|max:255',
            'sks' => 'required',
        ]);

        $matakuliahs = new Matakuliahs;

        $matakuliahs->nama_matakuliah = $request->nama_matakuliah;
        $matakuliahs->sks = $request->sks;

        $matakuliahs->save();

        return redirect('/matakuliahs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mk = Matakuliahs::where('id', $id)->first();
        return view('matakuliahs.show', ['matakuliahs' =>$mk]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mk = Matakuliahs::where('id', $id)->first();
        return view('matakuliahs.edit', ['matakuliahs' =>$mk]);
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
        $request->validate([
            'nama_matakuliah' => 'required|unique:matakuliahs|max:255',
            'sks' => 'required',
        ]);
        Matakuliahs::find($id)->update([
            'nama_matakuliah' => $request->nama_matakuliah,
            'sks' => $request->sks
        ]);

        return redirect('/matakuliahs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Matakuliahs::find($id)->delete();
        return redirect('/matakuliahs');
    }

    public function addmember($id)
    {
        $mhs = Mahasiswas::where('matakuliahs_id', '=', 0)->get();
        $mk = Matakuliahs::where('id', $id)->first();
        return view('matakuliahs.addmember', ['matakuliahs' =>$mk, 'mhs' => $mhs ]);
    }

    public function updateaddmember(Request $request, $id)
    {
        $mhs = Mahasiswas::where('id', $request->mahasiswas_id)->first();
        Mahasiswas::find($mhs -> id)->update([
            'matakuliahs_id' => $id
        ]);

        return redirect('/matakuliahs/addmember/' . $id);
    }

    public function deleteaddmember(Request $request, $id)
    {
        //dd($id);
        Mahasiswas::find($id)->update([
            'matakuliahs_id' => 0
        ]);

        return redirect('/matakuliahs');
    }
}