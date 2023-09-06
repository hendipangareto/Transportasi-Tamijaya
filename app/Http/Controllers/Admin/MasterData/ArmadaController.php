<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\Armada;

class ArmadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'armada_category' => 'required|max:10|min:1',
                'armada_type' => 'required|max:255|min:1',
                'armada_seat' => 'required|max:255|min:1',
                'armada_merk' => 'required|max:255|min:1',
                'armada_no_police' => 'required|max:255|min:1',
            ],
            [
                'armada_category.required' => 'Silahkan mengisi data category armada',
                'armada_category.min' => 'Kode minimal 1 karakter alfanumerik',
                'armada_category.max' => 'Kode maksimal 10 karakter alfanumerik',
                'armada_type.required' => 'Silahkan mengisi data type Armada',
                'armada_type.min' => 'Kode minimal 1 karakter alfanumerik',
                'armada_type.max' => 'Kode maksimal 10 karakter alfanumerik',
                'armada_seat.required' => 'Silahkan mengisi data seat armada',
                'armada_seat.min' => 'Kode minimal 1 karakter alfanumerik',
                'armada_seat.max' => 'Kode maksimal 10 karakter alfanumerik',
                'armada_merk.required' => 'Silahkan mengisi merk armada',
                'armada_merk.min' => 'Kode minimal 1 karakter alfanumerik',
                'armada_merk.max' => 'Kode maksimal 10 karakter alfanumerik',
                'armada_no_police.required' => 'Silahkan mengisi no polisi Armada',
                'armada_no_police.min' => 'Kode minimal 1 karakter alfanumerik',
                'armada_no_police.max' => 'Kode maksimal 10 karakter alfanumerik',
            ]
        );
    }

    public function index()
    {
        return view('admin.master-data.armada.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Armada::orderBy('id', 'ASC')->get();
        return view('admin.master-data.armada.display', ['armada' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_validation($request);
        $data = Armada::create($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menambahkan data armada',
            'status' => $data ? 200 : 400,
        ]);
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
        $data = Armada::findOrFail($id);
        return response()->json([
            'data' => $data,
            'status' => $data ? 200 : 400,
        ]);
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
        $data = Armada::findOrFail($id);
        $data->update($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil mengubah data ' . $data->facility_name,
            'status' => $data ? 200 : 400,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Armada::destroy($id);
        return response()->json([
            'data' => $id,
            'message' => 'Berhasil menghapus data armada',
            'status' => 200,
        ]);
    }
}
