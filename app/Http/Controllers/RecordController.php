<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecordController extends Controller
{
    public function index(Request $request)
    {
        session()->flashInput($request->input());

        if(isset($_GET['details'])){
            $details = DB::table('records')->orderBy('sub_id', 'asc')->where('block_number', $request->details)->get();
            return view('record.index')->with(['details' => $details]);
        }

        if (
            (isset($_GET['name']) && $request->name !== null) ||
            (isset($_GET['piece_number']) && $request->piece_number !== null)
        ) {

            $records = DB::table('records')->orderBy('sub_id', 'asc')
                -> when($request->name !== null)
                ->where('owner_name', 'like', '%' . $request->name . '%')
                ->orWhere('block_number', 'like', '%' . $request->name . '%')
                ->when($request->piece_number !== null)
                ->where('block_number', $request->piece_number)
                ->paginate(25);

            $records->appends($request->all());

            return view('record.index')->with(['records' => $records]);
        } else {
            return view('record.index');
        }
    }
}
