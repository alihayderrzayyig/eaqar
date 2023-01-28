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
            $records = DB::table('records')->orderBy('sub_id', 'asc')
            ->where('owner_name', 'like', '%' . $request->search . '%')
            ->orWhere('block_number', $request->search)
            ->paginate(25);
            return view('admin.records.index', compact('records'));
        } else {
            $records = DB::table('records')->orderBy('sub_id', 'asc')->paginate(25);
            return view('admin.records.index', compact('records'));
        }
    }

    public function create()
    {
        return view('admin.records.import');
    }

    public function store(Request $request)
    {
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

        return redirect()->route('admin.record.index')->with('message', 'file added!');
    }
}
