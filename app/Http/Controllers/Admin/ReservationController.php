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
        $reservations = DB::table('reservations')->orderBy('sub_id', 'desc')->paginate(25);
        return view('admin.reservation.index', compact('reservations'));
    }

    public function import()
    {
        return view('admin.reservation.import');
    }

    public function create()
    {
        return view('admin.reservation.edit');
    }

    public function store(Request $request)
    {
        if ($request->has('file')) {
            $request->validate([
                'file' => 'required|mimes:csv,txt'
            ]);
            $file = file($request->file->getRealPath());
            //لحذف العناوين من الفايل
            $data = array_slice($file, 1);
            $parts = (array_chunk($data, 5000));
            foreach ($parts as $index => $part) {
                $fileName = public_path('pending-reservation/' . date('y-m-d-H-i-s') . $index . '.csv');
                file_put_contents($fileName, $part);
            }
            (new Reservation())->ImportToDb();
            return redirect()->route('admin.reservations.index')->with('message', 'file added!');
        } else {
            $request->validate([
                'name' => "required|string",
                'book_num' => "required|string",
                'book_type' => "required|string",
            ]);
            $reservation = DB::table('reservations')->orderBy('sub_id', 'desc')->first();
            Reservation::create([
                'sub_id'      => 1 + (int)$reservation->sub_id,
                'name'        => $request->name,
                'mother_name' => $request->mother_name,
                'birth'        => $request->birth,
                'address'     => $request->address,
                'job'         => $request->job,
                'book_num'    => $request->book_num,
                'history'     => $request->history,
                'note'        => $request->note,
                'book_type'   => $request->book_type,
                'disc_num'    => $request->disc_num,

            ]);
            return redirect()->back()->with('message', 'added!');

        }
    }

    public function edit(Reservation $reservation)
    {
        return view('admin.reservation.edit', compact('reservation'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        // dd('uuuuuuuuuuuuu');
        $request->validate([
            'name'        => 'required|string',
            'mother_name' => 'nullable|string',
            'birth'       => 'nullable|string',
            'address'     => 'nullable|string',
            'job'         => 'nullable|string',
            'book_num'    => 'nullable|string',
            'history'     => 'nullable|string',
            'note'        => 'nullable|string',
            'book_type'   => 'nullable|string',
            'disc_num'    => 'nullable|string',
        ]);

        $reservation->update($request->only(
            'name',
            'mother_name',
            'birth',
            'address',
            'job',
            'book_num',
            'history',
            'note',
            'book_type',
            'disc_num',
        ));
        return redirect()->back()->with('message', 'updated!');
    }

    public function search(Request $request)
    {
        session()->flashInput($request->input());

        $request->validate([
            'name' => 'required|min:3'
        ]);

        $reservations = DB::table('reservations')->where('name', 'like', '%' . $request->name . '%')->orderBy('sub_id', 'asc')->paginate(25);
        $reservations->appends($request->all());
        return view('admin.reservation.index', compact('reservations'));
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        // return redirect()->route('admin.reservation.index')->with('message', 'reservation deleted!');
        return redirect()->back()->with('message', 'reservation deleted!');
    }
}
