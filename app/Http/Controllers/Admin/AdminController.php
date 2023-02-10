<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Record;
use App\Models\Reservation;
use App\Models\Tamlik;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function goHome(){
        (new Record())->ImportToDb();
        (new Reservation())->ImportToDb();
        (new Tamlik())->ImportToDb();
        return redirect()->route('dashboard');
    }

}
