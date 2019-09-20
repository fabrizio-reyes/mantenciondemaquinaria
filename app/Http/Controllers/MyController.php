<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Exports\MaquinariasExport;
use App\Imports\MaquinariasImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Maquinaria;

class MyController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new MaquinariasExport, 'maquinarias.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new MaquinariasImport,request()->file('file'));
           
        return back()->with('status','IMPORTACIÓN REALIZADA CON ÉXITO');
    }
}