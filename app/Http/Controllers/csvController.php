<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class csvController extends Controller
{
    // CSV upload
    public function upload_csv(Request $request)
    {
    	$validatedData = $request->validate([
            'file' => 'required|file|mimes:csv,txt|max:10000'
        ]);

       $ress = Storage::disk('public')->put($request->file, 'Contacts', 755);
       return redirect('master_csv');
    }


    // CSV dawnload
    public function dawnload_csv(Request $request)
    {
    	$validatedData = $request->validate([
    		'startdate' => 'required|string',
            'enddate' => 'required|string',
        ]);
    	// $date = new DateTime();
　　　　 // $filename = $date->format('Y-m-d H:i:s') . '.csv';

    	// $filename = "sample.csv";
        // return Storage::download($filename);
    }
}
