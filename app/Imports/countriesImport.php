<?php

namespace App\Imports;

use App\Models\countery;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;
class countriesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new countery([
            'countery_name'=>$row[0],
            'description'=>$row[1],
            'active'=>1,
            'user_id'=>Auth::user()->id,
        ]);
    }
}
