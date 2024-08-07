<?php

namespace App\Http\Controllers;

class ImportController extends Controller
{
    public function index(): string
    {
        return view('import');
    }
}
