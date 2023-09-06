<?php

namespace App\Http\Controllers\Admin\ManagementCustomer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\Customer;
use App\Models\MasterData\Province;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    private function _validation(Request $request)
    {
        // $validation = $request->validate(
        //     [
        //         'facility_code' => 'required|max:10|min:1|unique:facilities',
        //         'facility_name' => 'required|max:255|min:1',
        //     ],
        //     [
        //         'facility_code.required' => 'Silahkan mengisi data kode',
        //         'facility_code.min' => 'Kode minimal 1 karakter alfanumerik',
        //         'facility_code.max' => 'Kode maksimal 10 karakter alfanumerik',
        //         'facility_code.unique' => 'Kode kategori telah digunakan',
        //         'facility_name.required' => 'Silahkan mengisi data nama',
        //         'facility_name.min' => 'Nama minimal 1 karakter alfanumerik',
        //         'facility_name.max' => 'Nama maksimal 255 karakter alfanumerik'
        //     ]
        // );
    }

    public function index()
    {
        $provinces = Province::orderBy('state_name', 'ASC')->get();
        return view('admin.management-customer.customer.index', ['provinces' => $provinces]);
    }

    public function create()
    {

        // $data = Customer::orderBy('id', 'ASC')->get();
        $data = DB::table('customers')->join('provinces', 'provinces.id', 'customers.id_province')
            ->join('cities', 'cities.id', 'customers.id_city')
            ->select('customers.*', 'cities.city_name', 'provinces.state_name')->get();
        return view('admin.management-customer.customer.display', ['data' => $data]);
    }
    public function store(Request $request)
    {
        // $this->_validation($request);
        $reqData = $request->all();
        if (!isset($reqData['customer_code'])) {
            $count = Customer::count();
            if ($count > 0) {
                $last_data =  Customer::latest('id')->first();
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
            $code_data = "CST-" . $output;
            $reqData['customer_code'] = $code_data ;
            $reqData['customer_nik'] = '-';
        }

        $data = Customer::create($reqData);
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menambahkan data ' . $data->customer_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function show($type)
    {
        $count = Customer::count();
        if ($count > 0) {
            $last_data =  Customer::latest('id')->first();
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
        $code_data = "CST-" . $output;
        return response()->json([
            'data' => $code_data,
            'status' => 200,
        ]);
    }
    public function edit($id)
    {
        $data = Customer::findOrFail($id);
        return response()->json([
            'data' => $data,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = Customer::findOrFail($id);
        $data->update($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil mengubah data ' . $data->customer_name,
            'status' => $data ? 200 : 400,
        ]);
    }

    public function destroy($id)
    {
        Customer::destroy($id);
        return response()->json([
            'data' => $id,
            'message' => 'Berhasil menghapus data Customer',
            'status' => 200,
        ]);
    }
}
