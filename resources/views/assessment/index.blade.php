  @extends('layouts.assessment')
  
  @section('title','買取簡易査定')
  @push('css')
  <link href="{{ secure_asset('css/assessment.css') }}" rel="stylesheet">
  @endpush
  
  @section('content')
    <div class="container">
        
        <h2 class="assessment_start">簡易査定を開始する</h2>
        
        
        
        <div class="attention">
          <p>注意事項</p>
        <ul>
          　<li>年式が<span style="color:red;">７年以上前</span>の製品や、<span style="color:red;">正常に動作しないもの</span>は当店では買取ができません。ご了承ください。</li>
            <li>実際の査定時には、当店の基準に基づき査定するため、<span style="color:red;">状態等により金額が変動する</span>場合がございます。</li>
            <li>ヒーターや扇風機等の家電は、オフシーズンは買取ができない場合がございます。</li>
            <li>冷蔵庫、洗濯機は<a href="https://www.fukatsu-inc.co.jp/shutcho-purchase/">出張買取対象商品</a>です。</li>
            <li>備考欄、画像欄に入力することで、より正確な査定結果が得られます。</li>
            <li>AI査定のため、若干の差異が出る場合がございますのであらかじめご了承ください。</li>
            
        </ul>
        </div>
        @if (count($errors) > 0)
                          <ul>
                              @foreach($errors->all() as $e)
                                  <li>{{ $e }}</li>
                              @endforeach
                          </ul>
                      @endif
        <form action="/assessment/result" method="post" enctype="multipart/form-data">
          @csrf
          <label>商品名<br>
              <select name="name">
                <option value="" disabled selected style="display:none;">選択してください</option>
                <option value="オーブンレンジ">オーブンレンジ</option>
                <option value="電子レンジ">電子レンジ</option>
                <option value="加湿器">加湿器</option>
                <option value="ブルーレイプレーヤー">ブルーレイプレーヤー</option>
                <option value="掃除機">掃除機</option>
                <option value="扇風機">扇風機</option>
                <option value="ヒーター">ヒーター</option>
                <option value="テレビ(~32インチ)">テレビ(~32インチ)</option>
                <option value="テレビ(~58インチ)">テレビ(~58インチ)</option>
                <option value="ガスコンロlp">ガスコンロ（LP）</option>
                <option value="ガスコンロ都市ガス">ガスコンロ（都市ガス）</option>
                <option value="炊飯器">炊飯器</option>
                <option value="空気清浄機">空気清浄機</option>
                <option value="その他">その他</option>
               </select></label><br>
          
          <label>状態<br>
              <select name="condition">
                <option value="" disabled selected style="display:none;">選択してください</option>
                <option value="新品未使用、未開封">新品未使用、未開封</option>
                <option value="新品未使用">新品未使用</option>
                <option value="使用、美品">使用、美品</option>
                <option value="使用、使用感有り">使用、使用感有り</option>
                <option value="破損あり、動作可">破損あり、動作可</option>
              </select></label><br>
          
          <label>年式<br>
              <select name="model_year">
                <option value="" disabled selected style="display:none;">選択してください</option>
                @foreach ($years as $year)
                <option value="{{$year}}"> {{$year}}年式 </option>
                @endforeach 
              </select></label><br>
          
          <label>メーカー<br>
              <select name="brand">
                <option value="" disabled selected style="display:none;">選択してください</option>
                <option value="東芝">東芝</option>
                <option value="Panasonic">Panasonic</option>
                <option value="SHARP">SHARP</option>
                <option value="SONY">SONY</option>
                <option value="日立">日立</option>
                <option value="アイリスオーヤマ">アイリスオーヤマ</option>
                <option value="その他">その他(備考に入力してください。)</option>
                
                
            </select></label><br>
          
          <label>備考(任意)<br><textarea name="note" placeholder="備考欄に入力する場合はご利用可能なメールアドレスを必ずご入力ください。"　rows="15" cols="60" style="height:100px;"></textarea></label><br>

        <div class="image_space">
          <label>画像(任意)<br>
                <input type="file" class="form-control-file" name="image1" />
                <input type="file" class="form-control-file" name="image2" />
                <input type="file" class="form-control-file" name="image3" />
                <input type="file" class="form-control-file" name="image4" />
                <br>
        </div>
           <input type="submit" name="送信"/>
          
          
        </form>
        
    </div>
    
  @endsection
