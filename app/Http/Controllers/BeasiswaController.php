<?php

namespace App\Http\Controllers;


use App\Models\beasiswa;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //memanggil view index dari folder beasiswa
        // variabel pendaftaran berisi data dari model beasiswa dengan paginate 5(isi data 5)
        return view('beasiswa.index', [
            'pendaftaran' => beasiswa::latest()->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //memanggil ipk dari config(env)
        $defaultIPK = config('beasiswa.default_ipk');
        // menampilkan view create dengan membawa data ipk
        return view('beasiswa.create', compact('defaultIPK'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi diambil dari request input dari form
        $validateData = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'nomor_hp' => 'required',
            'semester' => 'required',
            'ipk' => 'required',
            'jenis_beasiswa' => 'required',
            'file_input' => 'required',

        ]);

        $validateData['status'] = $validateData['status'] ?? 'Belum Diverifikasi';
        // memeriksa apakah ada file yang diunggah dengan nama input file_input
        if ($request->file('file_input')) {
            $validateData['file_input'] = $request->file('file_input')->store('file', 'public');
        }



        // menyimpan data ke database 
        beasiswa::create($validateData);
        return redirect('hasil')->with('success', 'berhasil daftar');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
