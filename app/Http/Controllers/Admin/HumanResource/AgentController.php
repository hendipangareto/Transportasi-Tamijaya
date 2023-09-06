<?php

namespace App\Http\Controllers\Admin\HumanResource;

use App\Http\Controllers\Controller;
use App\Models\HumanResource\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'agent_code' => 'required|max:10|min:1|unique:agents',
                'agent_name' => 'required|max:255|min:1',
            ],
            [
                'agent_code.required' => 'Silahkan mengisi data kode',
                'agent_code.min' => 'Kode minimal 1 karakter alfanumerik',
                'agent_code.max' => 'Kode maksimal 10 karakter alfanumerik',
                'agent_code.unique' => 'Kode kategori telah digunakan',
                'agent_name.required' => 'Silahkan mengisi data nama',
                'agent_name.min' => 'Nama minimal 1 karakter alfanumerik',
                'agent_name.max' => 'Nama maksimal 255 karakter alfanumerik'
            ]
        );
    }
    public function index()
    {
        return view('admin.human-resource.agent.index');
    }

    public function create()
    {
        $data = Agent::orderBy('id', 'ASC')->get();
        return view('admin.human-resource.agent.display', ['data' => $data]);
    }
    public function store(Request $request)
    {
        $this->_validation($request);
        $data = Agent::create($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menambahkan data ' . $data->agent_name,
            'status' => $data ? 200 : 400,
        ]);
    }

    public function show($type)
    {
        $count = Agent::count();
        if ($count > 0) {
            $last_data =  Agent::latest('id')->first();
            $last_data_code = substr($last_data->data_code, -3);
            if (str_contains($last_data_code, "00")) {
                $sequence = substr($last_data_code, -1) + 1;
            } else if (str_contains($last_data_code, "0")) {
                $sequence = substr($last_data_code, -2) + 1;
            } else {
                $sequence =  $last_data->id + 1;
            }
        } else {
            $sequence =  1;
        }

        $output = '';
        if ($sequence == 1) {
            $sequence = 1;
        }
        if (strlen($sequence) == 1) {
            $output = '00' . $sequence;
        } else if (strlen($sequence) == 2) {
            $output = '0' . $sequence;
        } else {
            $output = $sequence;
        }
        $code_data = "AGN-" . $output;
        return response()->json([
            'data' => $code_data,
            'status' => 200,
        ]);
    }
    public function edit($id)
    {
        $data = Agent::findOrFail($id);
        return response()->json([
            'data' => $data,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = Agent::findOrFail($id);
        $data->update($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil mengubah data ' . $data->agent_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function destroy($id)
    {
        Agent::destroy($id);
        return response()->json([
            'data' => $id,
            'message' => 'Berhasil menghapus data Gaji',
            'status' => 200,
        ]);
    }
}
