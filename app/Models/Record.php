<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ImportToDb()
    {
        $path = public_path('pending-records/*.csv');

        $files = glob($path);

        foreach ($files as $file) {
            // ImportReservationCsv::dispatch($file);
            // dump('Import the file:---', $file);
            $data = array_map('str_getcsv', file($file));
            foreach ($data as $row) {
                // dd($row);
                self::updateOrCreate([
                    'sub_id' => $row[0],
                ],[
                    'number' => $row[1],
                    'history' => $row[2],
                    'year' => $row[3],
                    'skin' => $row[4],
                    'owner_name' => $row[5],
                    'block_number' => $row[6],
                    'district_name' => $row[7],
                    'sex' => $row[8],
                    'transaction_type' => $row[9],
                    'meter' => $row[10],
                    'olc' => $row[11],
                    'dunum' => $row[12],
                ]);

            }

            // dump('Done import the file:---', $file);
            unlink($file);
        }
    }
}
