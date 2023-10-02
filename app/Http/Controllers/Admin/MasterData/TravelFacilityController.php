<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use App\Models\MasterData\TravelFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class TravelFacilityController extends Controller
{
    public function getTravelFacility()
    {
        $TravelFacility = TravelFacility::all();
        return view('admin.master-data.travel-facility.index', compact('TravelFacility'));
    }

    public function TambahTravelFacility(Request $request)
    {
        DB::beginTransaction();
        try {
            $TravelFacility = new TravelFacility();

            // Mengambil kode kategori terbaru
            $lastNomor = TravelFacility::orderBy('id', 'desc')->first();
            $lastNumber = $lastNomor ? intval(substr($lastNomor->travel_facility_code, -2)) : 0;
            $newNumber = $lastNumber + 1;

            // Membuat kode kategori baru dengan format 'BRG-001'
            $noTravelFacility = 'FCP-01' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

            $TravelFacility->travel_facility_code = $noTravelFacility;
            $TravelFacility->travel_facility_name = $request->travel_facility_name;
            $TravelFacility->travel_facility_description = $request->travel_facility_description;

            $TravelFacility->save();

            DB::commit();
            Session::flash('message', ['Berhasil menyimpan data fasilitas perjalanan', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data fasilitas perjalanan', 'error']);
        }

        return redirect()->route('travel-facility');
    }


    public function UpdateTravelFacility(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $TravelFacility = TravelFacility::findOrFail($id);

            $TravelFacility->travel_facility_name = $request->travel_facility_name;
            $TravelFacility->travel_facility_description = $request->travel_facility_description;

            $TravelFacility->save();

            DB::commit();
            Session::flash('message', ['Berhasil menyimpan data fasilitas perjalanan', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data fasilitas perjalanan', 'error']);
        }

        return redirect()->route('travel-facility');
    }


}
