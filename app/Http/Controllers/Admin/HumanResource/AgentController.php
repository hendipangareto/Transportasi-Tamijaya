<?php

namespace App\Http\Controllers\Admin\HumanResource;

use App\Http\Controllers\Controller;
use App\Models\HumanResource\Agent;
use App\Models\MasterData\City;
use App\Models\MasterData\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade as PDF;

class AgentController extends Controller
{


    public function index()
    {
        $provinces = Province::get();
        $city = City::get();

        $data = DB::table('agent')
            ->select('agent.*', 'provinces.state_name', 'cities.city_name')
            ->join('provinces', 'agent.id_province', 'provinces.id')
            ->join('cities', 'agent.id_city', 'cities.id')
            ->get();

        return view('admin.human-resource.agent.index', ['provinces' => $provinces, 'city' => $city, 'data' => $data]);
    }

    public function store(Request $request)
    {

        DB::beginTransaction();
        try {

            $agent = new Agent();
            $lastNomor = Agent::orderBy('id', 'desc')->first();
            $lastNumber = $lastNomor ? intval(substr($lastNomor->agent_code, -2)) : 0;
            $newNumber = $lastNumber + 1;
            $noAgent = 'AGN-1' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

            $agent->agent_code = $noAgent;
            $agent->agent_name = $request->agent_name;
            $agent->agent_description = $request->agent_description;
            $agent->id_city = $request->id_city;
            $agent->id_province = $request->id_province;
            $agent->agent_hp = $request->agent_hp;
            $agent->agent_tlp = $request->agent_tlp;
            $agent->agent_email = $request->agent_email;
            $agent->agent_alamat = $request->agent_alamat;
            $agent->agent_domicile = $agent->agent_alamat;

//            dd($agent);
            $agent->save();

            DB::commit();
            Session::flash('message', ['Berhasil mengubah data agen', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal mengubah data agen', 'error']);
        }

        return redirect()->route('human-resource.agent.index');
    }


    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {

            $agent = Agent::findOrFail($id);

            $agent->agent_name = $request->agent_name_update;
            $agent->id_province = $request->id_province_update;
            $agent->id_city = $request->update_city_name;
            $agent->agent_hp = $request->agent_hp_update;
            $agent->agent_tlp = $request->agent_tlp_update;
            $agent->agent_email = $request->agent_email_update;
            $agent->agent_alamat = $request->agent_alamat_update;
            $agent->agent_description = $request->agent_description_update;
            $agent->agent_domicile = $agent->agent_alamat;

//            dd($agent);
            $agent->save();

            DB::commit();
            Session::flash('message', ['Berhasil mengubah data agent', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal mengubah data agent', 'error']);
        }

        return redirect()->route('human-resource.agent.index');
    }

    public function DeleteAgent(Request $request)
    {
        $agentId = $request->input('agent_id');
        $data = Agent::find($agentId);
        $data->delete();

        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menghapus data agent!',
            'status' => 200,
        ]);
    }


    public function AgentPDF()
    {

        $agent = DB::table('agent')
            ->select('agent.*', 'provinces.state_name', 'cities.city_name')
            ->join('provinces', 'agent.id_province', 'provinces.id')
            ->join('cities', 'agent.id_city', 'cities.id')
            ->get();
        $filename = 'agent' . "_" . now()->format('Y_m_d_H_i_s') . '.pdf';

        $pdf = PDF::loadView('admin.human-resource.agent.cetak-pdf', compact('agent'));

        $pdf->setPaper('A4', 'portrait');

        // Set Page Number
        $canvas = $pdf->getDomPDF()->getCanvas();
        $pdf->getDomPDF()->set_option('isPhpEnabled', true);
        $canvas->page_text(550, 820, "Page {PAGE_NUM}", null, 8);


        $canvas->page_text(550 / 2, 820, now()->format('d-m-Y'), null, 8);
        $canvas->page_text(550 / 16, 820, 'PT Anugerah Karya Utami Gemilang', null, 8);
        return $pdf->stream($filename);
    }

}
