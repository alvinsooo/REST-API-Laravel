<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class StudentsUpdate implements ToModel, WithHeadingRow
{


    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        $params = [
            'email',
            'name',
            'address',
            'course'
        ];

        $newData =[];
        $find = $row['email'];

        if(array_key_exists('old_email', $row)){
            $find = $row['old_email'];
        }
        else{
            unset($row['email']);
        }

        foreach($params as $param){
            if(array_key_exists($param, $row)){
                $newData[$param] = $row[$param];
            }
        }

        Student::where(['email' => $find])->update($newData);
    }
}
