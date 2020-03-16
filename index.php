<?php


# Вывод ошибок
error_reporting(E_ALL); // Уровень вывода ошибок
ini_set('display_errors', 'on'); // Вывод ошибок включён
ini_set('log_errors', 'on'); //Вкл логирование ошибок
ini_set('error_log', dirname(__FILE__). '/error_log.txt'); //Куда писать лог

# Абсолютный путь
$path = dirname(__FILE__) . '/';

# Подключение конфигов
include_once $path . 'config.inc.php';

# Заголовок кодировки
header('Content-type: text/html; charset=' . $config['encoding']);

# Редирект для индексных файлов
$request_uri = str_replace($config['sitelink'], '', 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
if ($request_uri == 'index.php' || $request_uri == 'index.html')
	header('Location: ' . $config['sitelink']);

# Подключение библиотеки функций
include_once $path . 'func.inc.php';
$get_menu_items = 'GetMenuItems';
$get_complex_menu_items = 'GetComplexMenuItems';
$get_menu_items_u = 'GetMenuItemsU';
$get_block = 'GetBlock';

# Определение текущей страницы
$page = $this_page = (isset($_GET['content'])) ? $_GET['content'] : 'index';
$category = (isset($_GET['category'])) ? $_GET['category'] : '';

# Формирование GET запроса
parse_str(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY), $_GET);

# Подключение данных меню и блоков
include_once $path . 'template/menu.inc.php';
include_once $path . 'template/blocks.inc.php';

# Подключение страницы или вывод ошибки
if ($category != '')
{
	if (is_file($path . "content/$category/$page.inc.php"))
		include_once $path . "content/$category/$page.inc.php";
	else
		error404(true, $config['encoding']);
}
else
{
	if (is_file($path . "content/$page.inc.php"))
		include_once $path . "content/$page.inc.php";
	else
		error404(true, $config['encoding']);
}

# Выбор шаблона дизайна
$template = (!empty($template)) ? $template : $config['template'];

# Вывод дизайна на экран
ob_start();
include_once $path . "template/$template.inc.php";
ob_end_flush();