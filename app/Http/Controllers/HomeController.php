<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Helper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function testCreateJournal(Request $request){
        try {
            // $booking_id, $booking_type 'REGULER'/ 'PARIWISATA', $armada_type 'EXECUTIVE' / 'SUITESS', $journal_description, $amount, $action = 'APPROVE'
            return Helper::createJournal(3, 'REGULER', 'EXECUTIVE', 'TEST JOURNAL', 100000);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
