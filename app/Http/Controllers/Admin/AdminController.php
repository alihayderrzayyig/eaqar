<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Record;
use App\Models\Reservation;
use App\Models\Tamlik;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::count();
        $records = Record::count();
        $reservation = Reservation::count();
        $tamlik = Tamlik::count();
        $records = Record::count();

        $records_files = 0;
        $path1 = public_path('pending-records/*.csv');
        $files1 = glob($path1);
        $records_files += count($files1);

        $reservation_files = 0;
        $path2 = public_path('pending-reservation/*.csv');
        $files2 = glob($path2);
        $reservation_files += count($files2);

        $tamlik_files = 0;
        $path3 = public_path('pending-tamlik/*.csv');
        $files3 = glob($path3);
        $tamlik_files += count($files3);

        // dd($count);
        // foreach($files1 as $file){
        //     unlink($file);
        // }
        // foreach ($files2 as $file) {
        //     unlink($file);
        // }
        // foreach ($files3 as $file) {
        //     unlink($file);
        // }


        // dd($users);
        return view('admin.index')->with([
            'records' => $records,
            'reservation' => $reservation,
            'tamlik' => $tamlik,
            'users' => $users,
            'records_files' => $records_files,
            'reservation_files' => $reservation_files,
            'tamlik_files' => $tamlik_files,
        ]);
    }

    public function removeRecordsFiles()
    {
        $records_files = 0;
        $path1 = public_path('pending-records/*.csv');
        $files1 = glob($path1);
        $records_files += count($files1);
        foreach ($files1 as $file) {
            unlink($file);
        }
        return redirect()->back();
    }
    public function removeReservationFiles()
    {
        $reservation_files = 0;
        $path2 = public_path('pending-reservation/*.csv');
        $files2 = glob($path2);
        $reservation_files += count($files2);
        foreach ($files2 as $file) {
            unlink($file);
        }
        return redirect()->back();
    }
    public function removeTamlikFiles()
    {
        $tamlik_files = 0;
        $path3 = public_path('pending-tamlik/*.csv');
        $files3 = glob($path3);
        $tamlik_files += count($files3);
        foreach ($files3 as $file) {
            unlink($file);
        }
        return redirect()->back();
    }


    function compleatAddRecordsFiles()
    {
        (new Record())->ImportToDb();
        return redirect()->back();
    }
    function compleatAddReservationFiles()
    {
        (new Reservation())->ImportToDb();
        return redirect()->back();
    }
    function compleatAddTamlikFiles()
    {
        (new Tamlik())->ImportToDb();
        return redirect()->back();
    }


    public function goHome()
    {
        (new Record())->ImportToDb();
        (new Reservation())->ImportToDb();
        (new Tamlik())->ImportToDb();
        return redirect()->route('dashboard');
    }
}
