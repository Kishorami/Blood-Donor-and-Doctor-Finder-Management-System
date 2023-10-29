<?php

namespace App\Imports;

use App\Models\Donor;
use Maatwebsite\Excel\Concerns\ToModel;

class DonorImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Donor([
            

            'phone' => $row[0],   
            'password' => $row[1],     
            'fname' => $row[2],   
            'lname' => $row[3],   
            'blood_group' => $row[4], 
            'birth_date' => $row[5],    
            'age' => $row[6],   
            'email' => $row[7],   
            'division' =>$row[8],    
            'district' => $row[9],    
            'upazila' => $row[10], 
            'address' => $row[11],       
            'gender' => $row[12],    
            'post_code' => $row[13],   
            'reference' => $row[14],   
            'occupation' => $row[15], 




        ]);
    }
}
