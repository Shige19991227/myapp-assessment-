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
      
      $price_tables = 
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
      
      $condition_prices=
      ['新品未使用、未開封'=> 1.9 , '新品未使用'=> 1.7 , '使用、美品' => 1.5 ,'使用、使用感有り'=> 1.2 ,'破損あり、動作可'=> 0.8];
      
      $current_year = date('Y');
      $model_year_values=[1.5,1.4,1.3,1.2,1.1,1.0,0.9];
      $model_year_prices =[];
      for ($i = 0; $i < 7; $i++)  {
          $model_year_prices[$current_year] =$model_year_values[$i];
          $current_year -=1;
      }
      
      $brand_prices=
      ['東芝'=>1.2,'Panasonic'=>1.2,'SHARP'=>1.2,'SONY'=>1.2,'日立'=>1.1,'アイリスオーヤマ'=>1.1];
        
    
      
        $name = $request->input('name');
        $condition = $request->input('condition');
        $brand = $request->input('brand');
        $model_year = $request->input('model_year');
        $note = $request->input('note');
        
        $price_table = $price_tables[$name];
        $condition_price = $condition_prices[$condition];
        $model_year_price = $model_year_prices[$model_year];
        $brand_price = $brand_prices[$brand];
        $price = ($price_table['max_price']*$condition_price*$model_year_price*$brand_price);
        
        $assess->fill($form);
        $assess->save();
      
         if (isset($form['image1'])) {
        $path = $request->file('image1')->store('public/image');
        $assess->image_path1 = basename($path);
        $assess->save();
        return view('assessment.remarks');
        }
        else {
          $assess->image_path1 = null;
        }
      
         if (isset($form['image2'])) {
        $path = $request->file('image2')->store('public/image');
        $assess->image_path2 = basename($path);
        $assess->save();
        return view('assessment.remarks');
        }
        else {
          $assess->image_path2 = null;
        }
      
      
       if (isset($form['image3'])) {
        $path = $request->file('image3')->store('public/image');
        $assess->image_path3 = basename($path);
        $assess->save();
        return view('assessment.remarks');
        }
        else {
          $assess->image_path3 = null;
        }
      
      
       if (isset($form['image4'])) {
        $path = $request->file('image4')->store('public/image');
        $assess->image_path4 = basename($path);
        $assess->save();
        return view('assessment.remarks');
        }
        else {
          $assess->image_path4 = null;
        }
      
       if(isset($form['note'])){
          return view('assessment.remarks');
           
        }else{
           $assess->note=null;
        }

        $assess->fill($form);
        $assess->save();
        
        return view('assessment.result', ['name'=>$name,'brand'=>$brand,'model_year'=>$model_year , 'price_table'=>$price_table,'price' => $price]);
        
    }
    
}
