<?php

namespace App\Http\Controllers;

use App\Exports\EmployeesExport;
use App\Imports\EmployeesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function importExportView()
    {
        return view('import');
    }

    public function export()
    {
        return Excel::download(new EmployeesExport, 'employees.xlsx');
    }

    public function import()
    {
        // Excel::import(new EmployeesImport, request()->file('file'));
        Excel::import(new EmployeesImport, request()->file('file')->store('temp_employees_list'));
        return redirect()->back()->with('success', 'Data Imported Successfully');
    }
}
