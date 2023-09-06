<?php

namespace App\Http\Controllers\Client\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\Bank;

class MainMasterDataController extends Controller
{
    public function getBankById($id)
    {
        $data = Bank::findOrFail($id);
        return response()->json([
            'data' => $data,
            'status' => $data ? 200 : 400,
        ]);
    }
}
