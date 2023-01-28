<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamlik extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ImportToDb()
    {
        $path = public_path('pending-tamlik/*.csv');

        $files = glob($path);

        foreach ($files as $file) {

            $data = array_map('str_getcsv', file($file));
            foreach ($data as $row) {
                // dd($row);
                self::updateOrCreate([
                    'serial_number' => $row[0],
                ], [
                    'book_number' => $row[1],
                    'name' => $row[2],
                    'piece_number' => $row[3],
                ]);
            }

            // dump('Done import the file:---', $file);
            unlink($file);
        }
    }
}
