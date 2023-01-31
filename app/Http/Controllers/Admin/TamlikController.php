<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tamlik;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class TamlikController extends Controller
{
    public function index(Request $request)
    {
        session()->flashInput($request->input());


        if (isset($_GET['search'])) {
            $tamliks = DB::table('tamliks')->orderBy('serial_number', 'desc')
                ->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('piece_number', $request->search)
                ->paginate(25);
            return view('admin.tamliks.index', compact('tamliks'));
        } else {
            $tamliks = DB::table('tamliks')->orderBy('serial_number', 'desc')->paginate(25);
            return view('admin.tamliks.index', compact('tamliks'));
        }
    }

    public function create()
    {
        return view('admin.tamliks.import');
    }
    public function create2()
    {
        return view('admin.tamliks.edit');
    }


    public function store(Request $request)
    {
        if ($request->has('file')) {
            // dd('file');
            $request->validate([
                'file' => 'required|mimes:csv,txt'
            ]);
            $file = file($request->file->getRealPath());
            //لحذف العناوين من الفايل
            $data = array_slice($file, 1);
            $parts = (array_chunk($data, 2000));
            foreach ($parts as $index => $part) {
                $fileName = public_path('pending-tamlik/' . date('y-m-d-H-i-s') . $index . '.csv');
                file_put_contents($fileName, $part);
            }
            (new Tamlik())->ImportToDb();
            return redirect()->route('admin.tamlik.index')->with('message', 'file added!');
        } else {
            // dd('nofile');
            $request->validate([
                'book_number' => "required|string",
                'name' => "required|string",
                'piece_number' => "required|string",
            ]);
            $tamlik = DB::table('tamliks')->orderBy('serial_number', 'desc')->first();
            // dd($tamlik);
            Tamlik::create([
                'serial_number' => 1 + (int)$tamlik->serial_number,
                'book_number' => $request->book_number,
                'name' => $request->name,
                'piece_number' => $request->piece_number,
            ]);
            return redirect()->back()->with('message', 'added!');
        }
    }


    public function edit(Tamlik $tamlik)
    {

        // return redirect()->back();
        return view('admin.tamliks.edit', compact('tamlik'));
    }

    public function update(Request $request, Tamlik $tamlik)
    {
        $request->validate([
            'book_number' => "required|string",
            'name' => "required|string",
            'piece_number' => "required|string",
        ]);

        $tamlik->update($request->only('book_number', 'name', 'piece_number'));
        return redirect()->back()->with('message', 'updated!');
    }

    public function destroy(Tamlik $tamlik)
    {
        $tamlik->delete();
        return redirect()->back()->with('message', 'The deletion was completed successfully.');
    }

    // public function destroyAll()
    // {
    //     Tamlik::truncate();
    //     return redirect()->back()->with('message', 'The deletion was completed successfully.');
    // }
}
