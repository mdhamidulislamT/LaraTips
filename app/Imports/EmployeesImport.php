<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmployeesImport implements ToModel, WithStartRow, WithCustomCsvSettings, WithChunkReading, ShouldQueue
{
    public function startRow(): int
    {
        return 2;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'emp_id'     => $row[0], 
            'first_name'     => $row[1].' '.$row[2],
            'last_name'    => $row[3].' '. $row[4], 
            'gender'    => $row[5], 
        ]);
    }

    public function chunkSize(): int
    {
        return 1000; // For Small Size Data
        //return 2000; // For Medium Size Data
        // return 5000; // For Large Size Data
    }
}
