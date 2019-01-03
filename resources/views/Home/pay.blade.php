<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
</head>
<body>
    <div>
        <h1>欢迎来到SUN SHAO LEI 的店铺</h1>

        <div>
            <span>请选择要支付的金额</span>

            <br>

            <input type="text" class="values" placeholder="请选择要输入的金额">

            <br>

            @if($pay_type == 1 )
                <button class="button" value = "{{$pay_type}}" >微信支付</button>
            @else
                <button class="button" value = "{{$pay_type}}" >支付宝支付</button>
            @endif
        </div>
    </div>

</body>
</html>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.button').click(function () {
        var pay_type = $(this).val();
        var pay_value =$('.values').val();

        // alert(pay_type);
        // return false;
        $.ajax({
            url:"{{url('/pays')}}"+'/'+pay_type/*+'/'+pay_value*/,
            type:'get',
            dataType:'html',
            success:function (msg) {
              var  url = msg+'/'+pay_value;
                // console.log(url);
                // return false;
                window.location.href=url;
            }
        })
    })
</script>