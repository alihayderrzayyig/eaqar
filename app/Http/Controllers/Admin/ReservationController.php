<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = DB::table('reservations')->orderBy('sub_id', 'asc')->paginate(25);
        return view('admin.reservation.index', compact('reservations'));
        // return view('admin.reservation.index');
    }

    public function create()
    {
        return view('admin.reservation.import');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);
        // dd($request);

        $file = file($request->file->getRealPath());
        //لحذف العناوين من الفايل
        $data = array_slice($file,1);
        $parts = (array_chunk($data,5000));
        foreach($parts as $index=>$part){
            $fileName = public_path('pending-reservation/'.date('y-m-d-H-i-s').$index.'.csv');
            file_put_contents($fileName, $part);
        }

        (new Reservation())->ImportToDb();

        return redirect()->route('admin.reservation.index')->with('message', 'file added!');
    }

    public function search(Request $request){
        session()->flashInput($request->input());

        $request->validate([
            'name' => 'required|min:3'
        ]);

        $reservations = DB::table('reservations')->where('name', 'like', '%'.$request->name.'%')->orderBy('sub_id', 'asc')->paginate(25);
        $reservations->appends($request->all());
        return view('admin.reservation.index', compact('reservations'));
    }

    public function destroy(Reservation $reservation){
        $reservation->delete();
        return redirect()->route('admin.reservation.index')->with('message', 'reservation deleted!');
    }
}
