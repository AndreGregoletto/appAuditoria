<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TestController extends Controller
{
    public function getFileXls(Request $request)
    {

        if ($request->hasFile('arquivo')) {
            $file = $request->file('arquivo');
            
            $data = Excel::toArray([], $file);

            $excelData = $data[0];

            return response()->json(['data' => $excelData]);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
        
    }
}
