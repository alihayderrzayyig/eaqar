<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TamliksImport;
use App\Models\Tamlik;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class TamlikController extends Controller
{
    public function index(){
        $tamliks = DB::table('tamliks')->orderBy('id', 'asc')->paginate(25);
        return view('admin.tamliks.index', compact('tamliks'));
    }

    public function create(){
        return view('admin.tamliks.import');
    }

    public function store(Request $request){
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
    }


    public function edit(Tamlik $tamlik){

        return redirect()->back();
        // return view('admin.tamliks.edit');
    }

    public function destroy(Tamlik $tamlik){
        $tamlik->delete();
        return redirect()->back()->with('message', 'The deletion was completed successfully.');

    }
    // public function destroyAll()
    // {
    //     Tamlik::truncate();
    //     return redirect()->back()->with('message', 'The deletion was completed successfully.');
    // }
}
