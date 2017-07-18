<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    @if(isset($obj['id']))
    {{$obj['id']}}
    @endif
    {{$obj['registrant_name']}}
    {{$obj['registrant_telephone']}}
    {{$obj['registrant_city']}}
    {{$obj['domain_name']}}
    {{$obj['registrant_street']}}
    {{$obj['registrant_state']}}
    {{$obj['contact_email']}}



</div>
</body>
</html>
