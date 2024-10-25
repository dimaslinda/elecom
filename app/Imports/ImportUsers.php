<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportUsers implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 2;
    }
    public function model(array $row)
    {
        return new User([
            'name' => $row[1],
            'kelas' => $row[2],
            'tlp1' => $row[3],
            'tlp2' => $row[4],
            'tlp3' => $row[5],
            'nama_orangtua' => $row[6],
            'email' => $row[7],
            'password' => bcrypt($row[8]),
            'role' => $row[9],
        ]);
    }
}
