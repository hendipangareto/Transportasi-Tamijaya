<?php

namespace App\Http\Controllers\Admin\HumanResource;

use App\Http\Controllers\Controller;
use App\Models\MasterData\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StatusController extends Controller
{
    public function getListStatus()
    {
        $status = Status::all();
        return view('admin.human-resource.status.list-status', compact('status'));
    }

    public function TambahStatus(Request $request)
    {
        DB::beginTransaction();
        try {
            $status = new Status();
            $lastNomor = Status::orderBy('id', 'desc')->first();
            $lastNumber = $lastNomor ? intval(substr($lastNomor->status_code, -2)) : 0;
            $newNumber = $lastNumber + 1;
            $nostatus = 'STS-001' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

            $status->status_code = $nostatus;
            $status->status_name = $request->status_name;
            $status->status_description = $request->status_description;

            $status->save();

            DB::commit();
            Session::flash('message', ['Berhasil menyimpan data status', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data status', 'error']);
        }

        return redirect(route('human-resource.status.list-status'))->with('pesan-berhasil', 'Anda berhasil menambah data status');
    }


    public function UpdateStatus(Request $request, $id)
    {
        DB::beginTransaction();
        try {

            $status = Status::findOrFail($id);

            $status->status_name = $request->status_name;
            $status->status_description = $request->status_description;

            $status->update();

            DB::commit();
            Session::flash('message', ['Berhasil menyimpan data status', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data status', 'error']);
        }

        return redirect(route('human-resource.status.list-status'))->with('pesan-berhasil', 'Anda berhasil update data status');
    }

    public function delete(Request $request){
        $statusId = $request->input('id');
        $data = Status::find($statusId);
        $data->delete();

        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menghapus data status',
            'status' => 200,
        ]);
    }
}
