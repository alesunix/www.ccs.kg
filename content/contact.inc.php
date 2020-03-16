<?php
{
# Данные о странице
$title = 'Контакты';
$keywords = 'Контакты';
$description = 'Контакты Службы Специальной Связи';
$template = 'info';
$page_blocks = 'contact, facebook';

# Содержание страницы
$content = <<<EOF
<style>
   .grey  {
	color:#999;
	face="Times New Roman";
    text-shadow: 0.3px 0.4px 0.3px white, 0 0 1em /* Параметры тени */
    padding: 10px;
	font-size: 18px;
   }
   .blue  {
	color:#08c;
	face="Times New Roman";
    text-shadow: 0.3px 0.4px 0.3px white; /* Параметры тени */
    padding: 10px;
	font-size: 21px;
   }
  </style>
<p>
<b>Адрес: г. Бишкек, ул. Раззакова 55</b><br>
<a href="/feedback.html">E-mail: ccs@ccs.kg</a><br>
Телефон:<br>
(0312) 660-834<br>
(0312) 625-982<br>
(0555) 855-777<br>
<br>

<table class="bordered">
<caption><b><big>      </b></big></caption>
<tr><th colspan="6"><font color="#df2b2c"><big>Руководство</font></th></tr>
<tr><td><img src="/i/ONI.jpg" height="150" width="150" alt=""></td>
<td>Осмонов Нурлан Ибраимович<br>Генеральный директор<br>Тел: +996(312)664757<br>Адрес электронной почты - n.osmonov@ccs.kg</td>
<td><img src="/i/DEM.jpg" height="150" width="150" alt=""></td>
<td>Дурусалиев Эрмек Муратович<br>Первый заместитель генерального директора<br>Тел: +996(312)622804<br>Адрес электронной почты - e.durusaliev@ccs.kg</td> 
<td><img src="/i/SAS.jpg" height="150" width="150" alt=""></td>
<td>Салиева Айнагуль Салиевна<br>Заместитель генерального директора<br>Тел: +996(312)661862<br>Адрес электронной почты - asalieva@ccs.kg</td></tr>
</table>
<br>


<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2923.8889274690696!2d74.6024010154727!3d42.875188479155554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x389eb7ac9c96ec91%3A0xddb3722bd435373a!2z0JPQnyDQodC70YPQttCx0LAg0YHQv9C10YbQuNCw0LvRjNC90L7QuSDRgdCy0Y_Qt9C4!5e0!3m2!1sru!2skg!4v1534223569761" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

</p>
<!--Стиль ТАБЛИЦЫ с подсветкой-->
<style>
.bordered {
    border: solid #ccc 1px;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: 0 1px 1px #ccc; 
    -moz-box-shadow: 0 1px 1px #ccc; 
    box-shadow: 0 1px 1px #ccc;     
    width: 100%; /* Ширина таблицы */    
}
 
.bordered tr:hover {
    background: #fbf8e9;
    -o-transition: all 0.1s ease-in-out;
    -webkit-transition: all 0.1s ease-in-out;
    -moz-transition: all 0.1s ease-in-out;
    -ms-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;     
}    
 
.bordered td, .bordered th {
    border-left: 1px solid #ccc;
    border-top: 1px solid #ccc;
    padding: 1px;
    text-align: center;    
}
 
.bordered th {
    padding-top:21px;
    background-color: #dce9f9;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#ebf3fc), to(#dce9f9));
    background-image: -webkit-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:    -moz-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:     -ms-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:      -o-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:         linear-gradient(top, #ebf3fc, #dce9f9);
    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; 
    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        
    border-top: none;
    text-shadow: 0 1px 0 rgba(255,255,255,.5); 
}
 
.bordered td:first-child, .bordered th:first-child {
    border-left: none;
}
 
.bordered th:first-child {
    -moz-border-radius: 6px 0 0 0;
    -webkit-border-radius: 6px 0 0 0;
    border-radius: 6px 0 0 0;
}
 
.bordered th:last-child {
    -moz-border-radius: 0 6px 0 0;
    -webkit-border-radius: 0 6px 0 0;
    border-radius: 0 6px 0 0;
}
 
.bordered th:only-child{
    -moz-border-radius: 6px 6px 0 0;
    -webkit-border-radius: 6px 6px 0 0;
    border-radius: 6px 6px 0 0;
}
 
.bordered tr:last-child td:first-child {
    -moz-border-radius: 0 0 0 6px;
    -webkit-border-radius: 0 0 0 6px;
    border-radius: 0 0 0 6px;
}
 
.bordered tr:last-child td:last-child {
    -moz-border-radius: 0 0 6px 0;
    -webkit-border-radius: 0 0 6px 0;
    border-radius: 0 0 6px 0;
}
</style>
EOF;
}