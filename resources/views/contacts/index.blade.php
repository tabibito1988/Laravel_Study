<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" >
<script>
  $(function() {
    $("#datepicker").datepicker();
    $("#datepicker").datepicker("option", "showOn", 'button');
    $("#datepicker").datepicker("option", "buttonImage", '/image/ico_calendar.png');
    $(".form-group").css("padding","7px");
    $("button.ui-datepicker-trigger").css("margin","7px").css("padding","5px");
  });
</script>
</head>
<body>
<div class="container">
    <h3>お問い合わせ</h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {!! Form::open(['url' => '/store/', 'method' => 'post', 'files' => true]) !!}
        <div class="form-group">
            <label>姓</label>
            <input type="text" class="form-control" name="firstname" placeholder="姓を入力してください">
        </div>
        <div class="form-group">
            <label>名</label>
            <input type="text" class="form-control" name="lastname" placeholder="名を入力してください">
        </div>
        <div class="form-group">
            <label>ふりがな</label>
            <input type="text" class="form-control" name="kana" placeholder="ふりがなを入力してください">
        </div>
        <div class="form-group">
            <label>性別</label>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="sex" value="1">男性
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="sex" value="0">女性
                </label>
            </div>
        </div>
        <div class="form-group">
            <label>生年月日</label>
            <input type="text" id="datepicker" class="form-control" name="birthday" placeholder="生年月日を入力してください">    
        </div>
        <div class="form-group">
            <label>電話番号</label>
            <input type="text" class="form-control" name="tel[]">
            - <input type="text" class="form-control" name="tel[]">
            - <input type="text" class="form-control" name="tel[]">
        </div>
        <div class="form-group">
            <label>備考</label>
            <textarea class="form-control" name="contents" rows="5" cols="25"　placeholder="備考を入力してください"></textarea>
        </div>
        <div class="form-group">
            {!! Form::label('file', '画像アップロード', ['class' => 'control-label','name' => 'mainphoto']) !!}
            {!! Form::file('mainphoto') !!}
        </div>
        <div class="form-group">
            {!! Form::label('file', '画像アップロード', ['class' => 'control-label','name' => 'subphoto']) !!}
            {!! Form::file('subphoto') !!}
        </div>
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">送信</button>
            </div>
        </div>
    {!! Form::close() !!}
</div>
</body>
</html>