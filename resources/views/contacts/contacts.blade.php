<html>
<head>
</head>
<body>
<div class="container">
    <h3>お問い合わせ一覧</h3>
    @if (count($contacts) == 0)
        お問い合わせはございません。
    @else
        @foreach($contacts as $contact)
        --------------------------------<br>
            {!! Form::model($contact, ["method"=>"get",'url'=>['contacts/show',$contact->id]]) !!}
            かな{{$contact->kana}} <br>
            姓{{$contact->firstname}} <br>
            名{{$contact->lastname}} <br>
            内容{{$contact->contents}} <br>
            {!! Form::submit('詳細ページへ', ['class' => 'btn btn-primary form-control']) !!}<br>
            {!! Form::close() !!}
        @endforeach
         --------------------------------<br> 
    @endif
</body>
</html>