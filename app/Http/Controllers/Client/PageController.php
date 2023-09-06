<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\PickPoint;
use App\Models\MasterData\Bus;
use App\Models\MasterData\Bank;

class PageController extends Controller
{
    public function index()
    {
        $pickPoints = PickPoint::get();
        $banks = Bank::get();
        $buses = Bus::get();
        return view('client.pages.home.index', ["pickPoints" => $pickPoints, "buses" => $buses, "banks" => $banks]);
    }
}
