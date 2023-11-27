<?php
error_reporting(85);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta name="robots" content="noindex, nofollow">

        <title>Поздравляем! Ваш заказ принят!</title>

        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

        <style type="text/css">
            body {
                line-height: 1;
                height: 100%;
                font-family: Arial;
                font-size: 15px;
                color: #313e47;
                width: 100%;
                height: 100%;
                padding: 0;
                margin: 0;
            }
            h2 {
                margin: 0;
                padding: 0;
                font-size: 36px;
                line-height: 44px;
                color: #313e47;
                text-align: center;
                font-weight: bold;
            }
            a {
                color: #69B9FF;
            }
            .list_info li span {
                width: 150px;
                display: inline-block;
                font-weight: bold;
                font-style: normal;
            }
            .list_info {
               text-align: left;
               display: inline-block;
               list-style: none;
               margin-top: -10px;
               margin-bottom: -11px;
            }
            .list_info li {
                margin: 11px 0px;
            }
            .fail {
                margin: 10px 0 20px 0px;
                text-align: center;
            }
            .email {
                position: relative;
                text-align: center;
                margin-top: 40px;
            }
            .email input {
                height: 30px;
                width: 200px;
                font-size: 14px;
                padding-right: 10px;
                padding-left: 10px;
                outline: none;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                border: 1px solid #B6B6B6;
                margin-bottom: 10px;
            }
            .block_success {
                max-width: 960px;
                padding: 70px 30px 70px 30px;
                margin: -50px auto;
            }
            .success {
                text-align: center;
            }
        </style>        
    </head>
    <body>
        <div class="block_success">					
            <h2 style="text-transform: uppercase;">Поздравляем! Ваш заказ принят!</h2>
            <p class="success">В ближайшее время с вами свяжется оператор для подтверждения заказа. Пожалуйста, включите ваш контактный телефон.</p>
            <h3 class="success">Пожалуйста, проверьте правильность введенной Вами информации.</h3>
            <div class="success">
                <ul class="list_info">
                    <?=(trim($_GET['name'])?'<li><span>Имя:</span> <span id="client">'.htmlspecialchars($_GET['name']).'</span></li>':'')?>
                    <li><span>Телефон: </span><span id="tel"><?=htmlspecialchars($_GET['phone'])?></span></li>
                </ul>
            </div>
            <p class="fail success">Если вы ошиблись при заполнени формы, то, пожалуйста, <a href="./">заполните заявку еще раз</a></p>
        </div>


<!-- Facebook Pixel Code -->
<script type="text/javascript">
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window,document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  
  fbq('init', '1286990075286085');
  fbq('track', 'PageView');
  fbq('track', 'Lead');
</script>
<noscript><img src="https://www.facebook.com/tr?id=1286990075286085&ev=PageView&noscript=1" width="1" height="1"></noscript>
<noscript><img src="https://www.facebook.com/tr?id=1286990075286085&ev=Lead&noscript=1" width="1" height="1"></noscript>
<!-- End Facebook Pixel Code -->
    </body>
</html>