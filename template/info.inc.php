<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta name="yandex-verification" content="418939fd64ccf802" />
<meta name="google-site-verification" content="m16yXNLNA45nHR2RDE6DU0uOalOuNi_QPvmx1nnfPaE" />
<meta charset="<?=$config['encoding']?>" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?=$title?></title>
<meta name="keywords" content="<?=$keywords?>">
<meta name="description" content="<?=$description?>">
<link rel="stylesheet" href="<?=$config['sitelink']?>template/bootstrap/css/bootstrap.min.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="<?=$config['sitelink']?>template/info.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="<?=$config['sitelink']?>template/bootstrap/css/bootstrap-responsive.min.css" type="text/css" media="screen, projection">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0"/>
<meta name="apple-mobile-web-app-capable" content="yes">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/stylebutton.css" />
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "url": "http://ccs.kg/",
  "name": "Служба Специальной Связи Кыргызской Республики Атайын Байланыш Кызматы Спецсвязь Кыргызстана",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+996312660834",
    "contactType": "Customer service"
  }
}
</script>

</head>
<body>




<!--header-->
<header class="navbar navbar-fixed-top">
<nav class="navbar-inner">
<div class="container-fluid">
<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</a>
<!--<a class="brand" href="<?=$config['sitelink']?>"><?= $config['sitename']?></a><img src="<?=$config['sitelink']?>i/logo-small.png" alt="спецсвязь" class="pull-left" style="height:40px;">
<img src="<?=$config['sitelink']?>i/logo-small.png" alt="спецсвязь" class="pull-left" style="height:40px;">-->
<a class="brand" href="<?=$config['sitelink']?>" title="<?=$config['sitename']?>"><span class="text-info">&nbsp;<?=$config['sitename']?></span></a>
<div class="nav-collapse collapse">
<ul class="nav pull-right">
<?=GetMenuItems($this_page, $mainmenu, $category)?>
<!-- Split button
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Услуги <span class="caret"></span></button>
  <ul class="dropdown-menu pull-right" role="menu">
    <li><a href="http://tlc.ccs.kg" target="_blank">Экспресс-доставка</a></li>
    <li><a href="/uslugi/money.html">Доставка наличных денег и ценных бумаг</a></li>
    <li><a href="/uslugi/drug.html">Доставка наркотических средств и психотропных веществ</a></li>
	<li><a href="/uslugi/dangerous.html">Доставка опасных грузов</a></li>
	<li><a href="/uslugi/secret.html">Доставка отправлений с грифом секретности</a></li>
	<li><a href="/uslugi/military.html">Доставка продукции военного назначения</a></li>
    <li class="divider"></li>
    <li><a href="/uslugi/uslugi.html">Все услуги</a></li>
  </ul>
</div> -->

<!--
google переводчик
<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
new google.translate.TranslateElement({pageLanguage: 'ru', includedLanguages: 'en,zh-TW', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
-->
</ul>
</div>
</div>
</nav>
</header>
<!--/header-->
<!--content-->
<section class="content container-fluid">
<div class="share42init pull-right" data-url="<?= $config['sitelink'] . $page ?>.html" data-title="<?= $title ?>"></div>
<h3 class="muted"><?=$config['slogan']?></h3>
<div class="row-fluid">
<article class="span9 well well-large well-inverse">
<h1><font style="color: #df2b2c; text-shadow: 1px 1px 1px black;"><?=$title;?></font></h1>
<?=$content;?>
</article><!--/span-->
<!--/Установка новостей-->
<?php
?>
<aside class="span3">
<!--/Блоки-->
<?=GetBlock($page_blocks, 'contact', $contact )?>
<?=GetBlock($page_blocks, 'info', $info )?>
<?=GetBlock($page_blocks, 'newsblock', $newsblock )?>
<?=GetBlock($page_blocks, 'reklam', $reklam )?>
<?=GetBlock($page_blocks, 'distance', $distance )?>
<?=GetBlock($page_blocks, 'facebook', $facebook )?>
<!--/Коментарии-->


</aside><!--/span-->
</div><!--/row-->
</section>
<!--/content-->
<!--footer-->
<style>
.footer-bg {
background-image: url(/i/footer.png);
text-shadow: 1px 1px 1px #000;
color: white;
}
</style>
<footer class="container-fluid & footer-bg">
<div class="navbar centered-pills">
<nav class="navbar-inner">
<ul class="nav-pills" style="margin:5px 0 0 0;">
<?=GetMenuItems($this_page, $footmenu, $category)?>
</ul>
</nav>
</div>
<p class="pull-right">
<small>
Телефоны: <br>
(0312) 660-834<br>
(0312) 625-982<br>
(0555) 855-777<br>
</small>

<!-- WWW.NET.KG , code for http://ccs.kg -->
<script language="javascript" type="text/javascript">
 java="1.0";
 java1=""+"refer="+escape(document.referrer)+"&amp;page="+escape(window.location.href);
 document.cookie="astratop=1; path=/";
 java1+="&amp;c="+(document.cookie?"yes":"now");
</script>
<script language="javascript1.1" type="text/javascript">
 java="1.1";
 java1+="&amp;java="+(navigator.javaEnabled()?"yes":"now");
</script>
<script language="javascript1.2" type="text/javascript">
 java="1.2";
 java1+="&amp;razresh="+screen.width+'x'+screen.height+"&amp;cvet="+
 (((navigator.appName.substring(0,3)=="Mic"))?
 screen.colorDepth:screen.pixelDepth);
</script>
<script language="javascript1.3" type="text/javascript">java="1.3"</script>
<script language="javascript" type="text/javascript">
 java1+="&amp;jscript="+java+"&amp;rand="+Math.random();
 document.write("<a href='http://www.net.kg/stat.php?id=6050&amp;fromsite=6050' target='_blank'>"+
 "<img src='http://www.net.kg/img.php?id=6050&amp;"+java1+
 "' border='0' alt='WWW.NET.KG' width='88' height='66' /></a>");
</script>
<!-- /WWW.NET.KG -->
</p>
<p>
<small><?=date('Y')?> © E-mail: ccs@ccs.kg<br>
Использование материалов без письменного согласия и ссылки на источник запрещено.<br>
</font></b></dfn></small>
<br>
</small>
<!--Informer.kg code start-->
<img src="http://www.informer.kg/pog/pngs/informer21.png" width="88" height="31" alt="Погода в Кыргызстане" border="0" />
<br>
<img src="http://www.informer.kg/cur/pngs/informer36.png" width="88" height="31" alt="Курс валют" border="0" />
<a href="https://webmaster.yandex.ru/siteinfo/?site=ccs.kg"><img width="88" height="31" alt="" border="0" src="https://yandex.ru/cycounter?ccs.kg&theme=dark&lang=ru"/></a>
<!-- Informer.kg code end-->
</p>
</footer>
<!--/footer -->
<!--/Google статистика -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-45405429-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-45405429-4');
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(56014606, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/56014606" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


<!--tooltips--->
<script type="text/javascript">
$(window).resize(function() {
if ($(window).width() < 979) {
$('aside a').tooltip('destroy');
$('header ul.nav.pull-right li:last-child a').tooltip('destroy');
$('aside a').tooltip({
placement: "top"
});
$('header ul.nav.pull-right li:last-child a').tooltip({
placement: "top"
});
}
else {
$('header ul.nav.pull-right li:last-child a').tooltip('destroy');
$('aside a').tooltip('destroy');
$('aside a').tooltip({
placement: "left"
});
$('header ul.nav.pull-right li:last-child a').tooltip({
placement: "bottom"
});
}
});

if ($(window).width() < 979) {
$('aside a').tooltip({
placement: "top"
});
$('header ul.nav.pull-right li:last-child a').tooltip({
placement: "top"
});
}
else {
$('aside a').tooltip({
placement: "left"
});
}
$('header a').tooltip({
placement: "bottom"
});
$('a,label,input').tooltip({});
</script>
<!--/tooltips--->
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="<?= $config['sitelink']?>template/bootstrap/js/bootstrap.min.js"></script>

</body></html>