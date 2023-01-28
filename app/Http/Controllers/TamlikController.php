<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TamlikController extends Controller
{
    public function index(Request $request)
    {
        session()->flashInput($request->input());

        if (
            (isset($_GET['name']) && $request->name !== null)||
            (isset($_GET['piece_number']) && $request->piece_number !== null)||
            (isset($_GET['serial_number']) && $request->serial_number !== null)
        ) {

            $tamliks = DB::table('tamliks')
            ->where('name', 'like', '%' . $request->name . '%')
            ->when($request->piece_number !== null)
            ->where('piece_number' ,$request->piece_number)
            ->when($request->serial_number !== null)
            ->where('serial_number', $request->serial_number)
            ->paginate(25);

            $tamliks->appends($request->all());

            return view('tamlik.index')->with(['tamliks' => $tamliks]);

        } else {
            return view('tamlik.index');
        }
    }

}
