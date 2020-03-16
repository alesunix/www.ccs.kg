<?php
#script start
# Ограничение доступа
if (!CheckLogin($config['access_login'], $config['access_password']))
	die('Доступ запрещён.');
#script end

# Данные о странице
$title = 'Сверх секретно';
$keywords = '';
$description = '';
$template = 'info';
$page_blocks = 'block2, sidebar_nav';

# Содержание страницы
$content = <<<EOF
<p>Тут хранятся какие-то секреты :)</p>
<p>Также это демонстрация страницы 3 уровня вложенности.</p>
EOF;
