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
      
      $price_table = 
      ['オーブンレンジ' => ['min_price' => 1000 , 'max_price' => 2000],
      '電子レンジ'=>['min_price'=> 700 ,'max_price'=> 1700 ],
      '加湿器'=>['min_price'=> 500 ,'max_price'=> 1300],
      'ブルーレイプレーヤー'=>['min_price'=> 1500 , 'max_price'=> 3000],
      '掃除機'=>['min_price'=> 800 , 'max_price'=> 1600],
      '扇風機'=>['min_price'=> 500 ,'max_price'=> 1500],
      'ヒーター'=>['min_price'=> 1000 , 'max_price'=> 2000],
      'テレビ(~32インチ)'=>['min_price'=> 2000 , 'max_price'=> 5000],
      'テレビ(~58インチ)'=>['min_price'=> 4000 , 'max_price'=> 8000],
      'ガスコンロ(LP)'=>['min_price'=> 1000 , 'max_price'=> 4000],
      'ガスコンロ(都市ガス)'=>['min_price'=> 800 , 'max_price'=> 3500],
      '炊飯器'=>['min_price'=> 800 ,'max_price'=> 2000],
      '空気清浄機'=>['min_price'=> 1200 ,'max_price'=> 1700]];
      
      $model_year_price=
      ['新品未使用、未開封'=> 1.9 , '新品未使用'=> 1.7 , '使用、美品' => 1.5 ,'使用、使用感有り'=> 1.2 ,'破損あり、動作可'=> 0.9];
      
      $brand_price=
      [];
      
      
      
      
      
      
      
      
      
      
      
      $price = $price_table[$request->input('name')];
      
        $name = $request->input('name');
        $brand = $request->input('brand');
        $model_year = $request->input('model_year');
        $note = $request->input('note');
        
        $assess->fill($form);
        $assess->save();
      
         if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $assess->image_path = basename($path);
        $assess->save();
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

        $assess->fill($form);
        $assess->save();
        
        return view('assessment.result', ['name'=>$name,'brand'=>$brand,'model_year'=>$model_year , 'price' => $price]);
        
    }
    
}
