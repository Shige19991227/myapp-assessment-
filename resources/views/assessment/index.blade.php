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
          　<li>年式が<span style="color:red;">７年前以上</span>の製品や、<span style="color:red;">正常に動作しないもの</span>は当店では買取ができません。ご了承ください。</li>
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
        <form action="/assessment/result" method="post">
          @csrf
          <label>商品名<br><input type="text" name="name"/></label><br>
          <label>状態<br><input type="text" name="condition" /></label><br>
          <label>年式<br><input type="text" name="model_year" /></label><br>
          <label>メーカー<br><input type="text" name="brand" /></label><br>
          <label>備考(任意)<br><textarea name="note" placeholder="備考欄に入力する場合はご利用可能なメールアドレスを必ずご入力ください。"　rows="15" cols="60" style="height:100px;"></textarea></label><br>
          <label>画像(任意)<br><input type="file" class="form-control-file" name="image"></label><br>
          <input type="submit" name="送信"  />
          
          
        </form>
        
    </div>
    
  @endsection
