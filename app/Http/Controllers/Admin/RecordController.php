<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecordController extends Controller
{
    public function index(Request $request)
    {
        session()->flashInput($request->input());

        if (isset($_GET['search'])) {
            $records = DB::table('records')->orderBy('sub_id', 'desc')
                ->where('owner_name', 'like', '%' . $request->search . '%')
                ->orWhere('block_number', $request->search)
                ->paginate(25);
            return view('admin.records.index', compact('records'));
        } else {
            $records = DB::table('records')->orderBy('sub_id', 'desc')->paginate(25);
            return view('admin.records.index', compact('records'));
        }
    }

    public function import()
    {
        return view('admin.records.import');
    }

    public function create()
    {
        return view('admin.records.edit');
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
            $parts = (array_chunk($data, 1000));

            foreach ($parts as $index => $part) {
                $fileName = public_path('pending-records/' . date('y-m-d-H-i-s') . $index . '.csv');
                file_put_contents($fileName, $part);
            }
            (new Record())->ImportToDb();

            return redirect()->route('admin.records.index')->with('message', 'file added!');
        } else {
            $request->validate([
                'number' => "required|string",
                'history' => "required|string",
                'year' => "required|string",
                'skin' => "required|string",
                'owner_name' => "required|string",
            ]);
            $record = DB::table('records')->orderBy('sub_id', 'desc')->first();
            Record::create([
                'sub_id'           => 1 + (int)$record->sub_id,
                'number'           => $request->number,
                'history'          => $request->history,
                'year'             => $request->year,
                'skin'             => $request->skin,
                'owner_name'       => $request->owner_name,
                'block_number'     => $request->block_number,
                'district_name'    => $request->district_name,
                'sex'              => $request->sex,
                'transaction_type' => $request->transaction_type,
                'meter'            => $request->meter,
                'olc'              => $request->olc,
                'dunum'            => $request->dunum,

            ]);
            return redirect()->back()->with('message', 'added!');
        }
    }

    public function edit(Record $record)
    {
        return view('admin.records.edit', compact('record'));
    }

    public function update(Request $request, Record $record)
    {
        $request->validate([
            'number' => "required|string",
            'history' => "required|string",
            'year' => "required|string",
            'skin' => "required|string",
            'owner_name' => "required|string",
        ]);

        $record->update($request->only(
            'number',
            'history',
            'year',
            'skin',
            'owner_name',
            'block_number',
            'district_name',
            'sex',
            'transaction_type',
            'meter',
            'olc',
            'dunum',
        ));
        return redirect()->back()->with('message', 'updated!');
    }

    public function search(Request $request)
    {
        session()->flashInput($request->input());

        $request->validate([
            'name' => 'required|min:3'
        ]);

        $records = DB::table('records')->where('name', 'like', '%' . $request->name . '%')->orderBy('sub_id', 'asc')->paginate(25);
        $records->appends($request->all());
        return view('admin.records.index', compact('records'));
    }


    public function destroy(Record $record)
    {
        $record->delete();
        // return redirect()->route('admin.reservation.index')->with('message', 'reservation deleted!');
        return redirect()->back()->with('message', 'Record deleted!');
    }
}
