<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Assessment;
use Carbon\Carbon;

class AssessmentController extends Controller
{
    //
    public function index()
    {
        $current_year = date('Y');
        $years =[];
        for ($i = 0; $i < 7; $i++)  {
            $years[] =($current_year);
            $current_year -=1;
        }
        return view('assessment.index', ['years'=>$years]);
    }
    public function result(Request $request)
    {
        $this->validate($request, Assessment::$rules);

      $assess = new Assessment;
      $form = $request->all();
      
      $price_table = ['電子レンジ' => ['min_price' => 1000 , 'max_price' => 2000]];
      $price = $price_table[$request->input('name')];
      
            if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $assess->image_path = basename($path);
        return view('assessment.remarks');
      }
      else {
          $assess->image_path = null;
      }
      
       if(isset($form['note'])){
          return view('assessment.remarks');
           
       }else{
           $assess->note=null;
        }
        $name = $request->input('name');
        $brand = $request->input('brand');
        $model_year = $request->input('model_year');
        $note = $request->input('note');
        $image = $request->input('image');
        
        
        $assess->fill($form);
        $assess->save();
        
        
        return view('assessment.result', ['name'=>$name,'brand'=>$brand,'model_year'=>$model_year , 'price' => $price]);
        
    }
    
}
