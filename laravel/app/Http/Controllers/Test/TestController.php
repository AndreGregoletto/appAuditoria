<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getFileXls(Request $request)
    {

        $file = $request->file('arquivo')->getRealPath();
        $content = file_get_contents($file);
    
        // Tenta converter o conteúdo para UTF-8
        $utf8Content = mb_convert_encoding($content, 'UTF-8', 'auto');
    
        return response()->json(['data' => $utf8Content]);
    }
}
