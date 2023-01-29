<?php

namespace App\Models;

use App\Jobs\ImportReservationCsv;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function ImportToDb(){
        $path = public_path('pending-reservation/*.csv');

        $files = glob($path);

        foreach($files as $file) {
            // ImportReservationCsv::dispatch($file);
            // dump('Import the file:---', $file);
            $data = array_map('str_getcsv', file($file));
            foreach ($data as $row) {
                // dd($row);
                try{
                    self::updateOrCreate([
                        'sub_id' => (int)$row[0],
                    ],[
                        'name' => $row[1],
                        'mother_name' => $row[2],
                        'birth' => $row[3],
                        'address' => $row[4],
                        'job' => $row[5],
                        'book_num' => $row[6],
                        'history' => $row[7],
                        'note' => $row[8],
                        'book_type' => $row[9],
                        'disc_num' => $row[10],
                    ]);
                }catch(Exception $e){
                    // dd($row);
                }
            }

            // dump('Done import the file:---', $file);
            unlink($file);

        }
    }
}
