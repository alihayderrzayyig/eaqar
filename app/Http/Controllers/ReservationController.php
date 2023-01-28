<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        session()->flashInput($request->input());

        if (isset($_GET['query'])  && $request['query'] !== null) {
            $request->validate([
                'query' => 'nullable|string|min:3'
            ]);
            // return($request['query']);
            $reservations = DB::table('reservations')->where('name', 'like', '%' . $request['query'] . '%')->paginate(25);
            $reservations->appends($request->all());
            return view('reservation.index')->with(["reservations" => $reservations]);
        } else {
            return view('reservation.index');
        }
    }

}
