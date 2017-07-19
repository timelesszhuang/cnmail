<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    @foreach($data as $item)
        <a href="{{$domain.$tableName."/".$tableName.$item['id']}}.html">{{$item['domain_name']}}}</a>
    @endforeach

</div>
<div>
    <p><a href="{{$pre_page}}">上一页</a></p>
    <p><a href="{{$next_page}}">下一页</a></p>
</div>
</body>

</html>
