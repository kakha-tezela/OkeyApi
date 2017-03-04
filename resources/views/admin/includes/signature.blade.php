<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>

    body{
        width: 400px;
        position: absolute;
    }
    header{
        position: relative;
        top: 0;
        left: 22px;
    }
    .okey-logo{

        margin-left: 20px;
        width: 146px;
        margin-right:20px;
    }
    .okey-logo img:first-child{
        margin-top:20px;
        display: block;
        float: left;
        margin-right: 30px;
    }
    .okey-logo img:last-child{
        margin-top:10px;
        display: block;
    }
    header h2{
        color:#58595b;
        font-size:18px;
        font-weight:bold;
        margin-bottom: 5px;
    }
    header h4{
        color: #f69679;
        width: 200px;
        margin-top: 10px;
    }
    section div{
        float:left;
        height:5px;
        width: 251px;
        position: relative;
        top: 0px;
        left: 0;
    }
    section .orange_line{
        -webkit-transform: skew(141deg,-10deg) rotate(10deg);
        -moz-transform: skew(141deg,-10deg) rotate(10deg);
        -ms-transform: skew(141deg,-10deg) rotate(10deg);
        -o-transform: skew(141deg,-10deg) rotate(10deg);
        transform: skew(141deg,-10deg) rotate(10deg);
        background:#f69679;
        width:150px;
    }
    section .black-line{
        margin-left:-20px;
        background: #58595b;
        width:272px;
        -webkit-transform: skew(141deg,-10deg) rotate(10deg);
        -moz-transform: skew(141deg,-10deg) rotate(10deg);
        -ms-transform: skew(141deg,-10deg) rotate(10deg);
        -o-transform: skew(141deg,-10deg) rotate(10deg);
        transform: skew(141deg,-10deg) rotate(10deg);
    }
    ul{
        margin: 14px 0 0 0 ;
        padding: 0;
    }
    ul li{
        margin:0 0  5px 0;
        color:#58595b;
        list-style-type: none;
        font-size: 14px;
    }
    ul li i{
        color:#f69679;
    }
    section{
        width: 438px;
        position: relative;
        left: 0;
        float: left;
    }
    .last-section{

        left: 0;

        width: 600px
    }
</style>
<body>
    <div style="position: relative">

    <header>
        <h2>CardHolder Name</h2>
        <h4>Position</h4>
    </header>
    <section >
        <div class="orange_line">

        </div>
        <div class="black-line">
        </div>
    </section >
    <div  style="clear: both;width: 100%;height: 10px"></div>
    <section class="last-section">
        <div class="okey-logo">
            <img src="https://okey.ge/mail/okey.jpg">
            <img src="https://okey.ge/mail/line.jpg">
        </div>
        <div class="addresses">
            <ul>
                <li> <img src="https://okey.ge/mail/home.jpg">
                    D. Agmashenebeli Alley, 12km. Digomi, Georgia</li>
                <li> <img src="https://okey.ge/mail/phone.jpg">
                     +995 322 68 08 88</li>
                <li> <img src="https://okey.ge/mail/envelope.jpg">
                    contact@okey.ge</li>
                <li> <img src="https://okey.ge/mail/globe.jpg">
                    www.okey.ge </li>
            </ul>
        </div>
    </section>

    </div>
</body>
</html>

