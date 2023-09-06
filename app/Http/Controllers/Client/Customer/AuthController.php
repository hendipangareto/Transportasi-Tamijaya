<?php

namespace App\Http\Controllers\Client\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mail;

class AuthController extends Controller
{
    public function loginCustomer(Request $request)
    {
        $email = $request->customer_email;
        $data = DB::table('customers')->where('customer_email', $email)->first();
        if (!$data) {
            return response()->json([
                'data' => $data,
                'message' => 'Email belum terdaftar pada sistem',
                'status' => 400,
            ]);
        }

        // Validate Password
        if (Hash::check($request->customer_password, $data->customer_password)) {
        // if ($data) {
            $ex_customer = explode(" ", $data->customer_name);
            $customer = [
                "customer_name" => $data->customer_name,
                "customer_email" => $data->customer_email,
                "customer_address" => $data->customer_address,
                "customer_phone" => $data->customer_phone,
                "customer_nick_name" => $ex_customer[0]
            ];
            return response()->json([
                'data' => $customer,
                'message' => 'Berhasil Login',
                'status' => 200,
            ]);
        } else {
            return response()->json([
                'data' => $data,
                'message' => 'Email dan Password tidak sesuai',
                'status' => 400,
            ]);
        }
    }

    public function registerCustomer(Request $request)
    {
        $customer_name = $request->customer_register_name;
        $customer_email = $request->customer_register_email;
        $customer_phone = $request->customer_register_phone;
        $new_otp = rand(1000, 9999);
        $otp_time = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +30 minutes"));

        $data = DB::table('customers')->where('customer_email', $customer_email)->first();
        if ($data) {
            DB::table('customers')
                ->where('customer_email', $customer_email)
                ->update(['otp' => $new_otp, 'otp_time' => $otp_time]);
        } else {
            DB::table('customers')->insert(
                [
                    'customer_name' => $customer_name,
                    'customer_email' => $customer_email,
                    'customer_phone' => $customer_phone,
                    'otp' => $new_otp,
                    'otp_time' => $otp_time
                ]
            );
        }

        $customer = array(
            'customer_name' => $customer_name, 'customer_email' => $customer_email, 'otp' => $new_otp,
            'otp_time' => $otp_time
        );
        // Send Email
        \Mail::send('layouts.template.otp-email', $customer, function ($message) use ($customer) {
            $message->to($customer['customer_email'], $customer['customer_name'])->subject('OTP Confirmation');
            $message->from('info@tamijaya.com', 'Konfirmasi OTP');
        });
    }

    public function confrimationOtp(Request $request)
    {
        $customer_email = $request->customer_register_email;
        $otp = $request->otp_value;
        $data = DB::table('customers')->where('customer_email', $customer_email)->where('otp', $otp)->first();
        if ($data) {
            DB::table('customers')
                ->where('customer_email', $customer_email)
                ->update(['otp' => NULL, 'otp_time' => NULL, 'is_validate' => 'Y']);
            return response()->json([
                'message' => 'OTP Sesuai',
                'status' => 200,
            ]);
        } else {
            return response()->json([
                'message' => 'OTP Tidak Sesuai',
                'status' => 400,
            ]);
        }
    }

    public function createPassword(Request $request)
    {
        $customer_email = $request->customer_register_email;
        $customer_register_password = bcrypt($request->customer_register_password);
        DB::table('customers')
            ->where('customer_email', $customer_email)
            ->update(['customer_password' => $customer_register_password]);
    }
}
