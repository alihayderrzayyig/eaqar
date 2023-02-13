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
        // dd($users);
        return view('admin.index')->with([
            'records' => $records,
            'reservation' => $reservation,
            'tamlik' => $tamlik,
            'users' => $users,
        ]);
    }

    public function goHome()
    {
        (new Record())->ImportToDb();
        (new Reservation())->ImportToDb();
        (new Tamlik())->ImportToDb();
        return redirect()->route('dashboard');
    }
}
