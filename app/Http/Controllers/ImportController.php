<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function index(): string
    {
        return view('import');
    }

    public function upload(Request $req)
    {
        //сделать сообщение об импорте
        Excel::import(new ProductsImport, $req->file('file'));
        $result = true;
        return view('import', ['result']);
    }
}
