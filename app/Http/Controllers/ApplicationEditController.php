<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationEditController extends Controller
{
    public function index(Request $request)
    {
        $applicationedit = Application::with('application')->where('is_deleted', false)->get();
  
        return view('application_edit', compact('applicationedit'));
    }

    
}
