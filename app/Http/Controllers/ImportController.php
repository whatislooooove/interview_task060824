<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function index()
    {
        return view('import');
    }

    public function upload(Request $req)
    {
        $req->validate([
            'file' => [
                'required',
                'bail',
                File::types(['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'])
                ->max('1mb')
            ]]);

        Excel::import(new ProductsImport, $req->file('file'));
        $res = true;
        return view('import', compact('res') );
    }
}
