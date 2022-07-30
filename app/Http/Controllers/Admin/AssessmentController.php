<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    //
    public function preview()
    {
        return view('admin.assessment.preview');
    }

    
}
