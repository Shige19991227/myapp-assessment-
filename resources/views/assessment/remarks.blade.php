@extends('layouts.assessment')

@section('title','査定を受け付けました')

　　@section('content')
<div class="container">
    <h2>査定受付完了のお知らせ</h2>
    
    <p>担当が確認の上、順番にメールアドレスに返信致します。少々お待ちください。</p>
    
    <table class="shop-data m-b10">
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>店舗名</th>
						<th>住所</th>
						<th>TEL/FAX</th>
						<th>営業時間</th>
						<th>定休日</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th><img src="https://www.fukatsu-inc.co.jp/img/shop/photo_recycle_daijuji.jpg" alt="リサイクルショップ フカツ 大樹寺店"></th>
						<td>リサイクルショップ フカツ 大樹寺店</td>
						<td>〒444-0912 岡崎市井田西町6番15号<br><span class="map-link"><a href="https://goo.gl/maps/vzLbbmGVSvL2" target="_blank">Map</a></span></td>
						<td>TEL(0564)24-0450<br>FAX(0564)65-8050</td>
						<td>営業時間10:00～19:00</td>
						<td>年中無休</td>
					</tr>
					<tr>
						<th><img src="https://www.fukatsu-inc.co.jp/img/shop/photo_recycle_okazakiminami.jpg" alt="リサイクルショップ フカツ 岡崎南店"></th>
						<td>リサイクルショップ フカツ 岡崎南店</td>
						<td>〒444-0840 岡崎市戸崎町越舞11-4<br><span class="map-link"><a href="https://goo.gl/maps/nB3SFFE1JcK2" target="_blank">Map</a></span></td>
						<td>
						TEL(0564)53-7287<br>FAX(0564)54-0858
						</td>
						<td>営業時間10:00～20:00</td>
						<td>年中無休</td>
					</tr>
					<tr>
						<th><img src="https://www.fukatsu-inc.co.jp/img/shop/photo_recycle_gamagori.jpg" alt="リサイクルショップ フカツ 蒲郡店"></th>
						<td>リサイクルショップ フカツ 蒲郡店</td>
						<td>〒443-0046 愛知県蒲郡市竹谷町梅薮2-1<br><span class="map-link"><a href="https://goo.gl/maps/5nmYNgZHqa72wTcB9" target="_blank">Map</a></span></td>
						<td>TEL(0533)95-4323<br>FAX 無し</td>
						<td>営業時間10:00～19:00</td>
						<td>年中無休</td>
					</tr>
					<tr>
						<th><img src="https://www.fukatsu-inc.co.jp/img/shop/photo_recycle_hekinan.jpg" alt="リサイクルショップ フカツ 蒲郡店"></th>
						<td>リサイクルショップ フカツ 碧南店</td>
						<td>〒447-0877 碧南市栄町2丁目3番<br><span class="map-link"><a href="https://goo.gl/maps/NqmALZNdNLC2" target="_blank">Map</a></span></td>
						<td>TEL(0566)41-3023<br>FAX 無し</td>
						<td>営業時間10:00～19:00</td>
						<td>年中無休</td>
					</tr>
				</tbody>
			</table>
</div>