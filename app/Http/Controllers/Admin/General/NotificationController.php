<?php

namespace App\Http\Controllers\Admin\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $data = Notification::where('user_id', Auth::user()->id)->get();
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil mendapatan notifikasi',
            'status' => 200,
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
