<!doctype html>
<html>
<head>
    <title>TBC</title>
</head>
<body>

@if(isset($start['error']))
    <h2>Error:</h2>
    <h1>{{ $start['error'] }}</h1>
@elseif(isset($start['TRANSACTION_ID']))
    <form name="returnform" id="Pay" action="https://securepay.ufc.ge/ecomm2/ClientHandler" method="POST">
        <input type="hidden" name="trans_id" value="{{ $start['TRANSACTION_ID'] }}">

        <noscript>
            <center>Please click the submit button below.<br>
            <input type="submit" name="submit" value="Submit"></center>
        </noscript>
    </form>

    <script>
        window.onload = document.forms.Pay.submit;
    </script>
@endif

</body>
</html>
