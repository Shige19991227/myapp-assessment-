<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    //
    public function index()
    {
        return view('assessment.index');
    }
    public function result(Request $request)
    {
        $this->validate($request, Assessment::$rules);

      $assess = new Assess;
      $form = $request->all();


      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $assess->image_path = basename($path);
      } else {
          $assess->image_path = null;
      }
      if(isset($form['note'])){
          return redirect('assessment.remarks');
      }
      
      
        $name = $request->input('name');
        $brand = $request->input('brand');
        $model_year = $request->input('model_year');
        $note = $request->input('note');
        
        
        return view('assessment.result', ['name'=>$name,'brand'=>$brand,'model_year'=>$model_year]);
        
    }
    
}
