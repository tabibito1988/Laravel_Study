<html>
<head>
</head>
<body>
<div class="container">
    <h3>問い合わせ内容</h3>
        カナ{{$contact->kana}} <br>
        姓{{$contact->firstname}} <br>
        名{{$contact->lastname}} <br>
        @if($contact->sex === 1)
            性別　男 <br>
        @elseif($contact->sex === 0)
            性別　女 <br>
        @endif
        生年月日{{$contact->birthday}} <br>
        電話番号{{$contact->tel}} <br>
        内容{{$contact->contents}} <br>
        <img src="data:img/png;base64,{{ $contact->mainphoto }}" alt="画像なし" /> <br>
        <img src="data:img/png;base64,{{ $contact->subphoto }}" alt="画像なし" /> <br><br>
        {{ Html::link('contacts', '戻る')}}<br>
</body>
</html>