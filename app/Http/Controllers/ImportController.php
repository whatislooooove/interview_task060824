<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function index()
    {
        return view('import');
    }

    public function upload(Request $req)
    {
        Excel::import(new ProductsImport, $req->file('file'));
        $res = true;
        return view('import', compact('res') );
    }
}
