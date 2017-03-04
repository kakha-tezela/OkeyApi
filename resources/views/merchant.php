<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchant</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script> 
</head>
<body>


    <dir id="wrapper">
        
        <form method="post" action="http://localhost:8000/api/installment/create">
            <div style="display:none">
                <input type="text" name="username" value="megamall">
                <input type="text" name="orderCode" value="<?=mt_rand(0, 2147483647)?>">
                <input type="text" name="installmentType" value="1">
                <input type="text" name="testMode" value="1">
                <input type="text" name="products" value='[{     "product_id": 1,     "title": "iPhone 7",     "amount": 1,     "price": 200 },{     "product_id": 2,     "title": "Samsung Gear",     "amount": 2,     "price": 500 }]'>
            </div>
            <h2>iPhone 7</h2>
            <h2>Samsung Gear</h2>
            <button type="submit">მიიღე განვადება</button>
        </form>

    </dir>

<script>
    $('form').ajaxForm({
        complete: function(xhr, textStatus) {
            if (xhr.status === 200) {
                window.location = `http://localhost:8000/installmentForm?hash=${xhr.responseText}`
            } else if (xhr.status === 409) {
                console.log('already exists')
            }
        }
    }); 
</script>
</body>
</html>