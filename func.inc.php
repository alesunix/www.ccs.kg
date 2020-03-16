<?php


# Функция обработки ошибки
function error404($pageout = false, $encoding = 'utf-8')
{
	header('Cache-Control: no-cache, no-store');
	header('Content-Type: text/html; charset=' . $encoding);
	header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
	if ($pageout)
		readfile('404.shtml');
	die;
}

# Генерация меню. По умолчанию ссылка активной страницы выделяется классом "active"
function GetMenuItems($page, $menu_items, $category = null)
{
	global $config;
	$menu = '';
	$category = ($category != null) ? $category . '/' : '';

	foreach ($menu_items as $i => $item)
	{
		if ($category . $page == $item[0])
			$menu .= '<li class="active"><a href="' . $config['sitelink'] . $item[0] . '.html" title="' . $item[2] . '">' . $item[1] . '</a></li>';
		else
			$menu .= '<li><a href="' . $config['sitelink'] . $item[0] . '.html" title="' . $item[2] . '">' . $item[1] . '</a></li>';
	}

	return $menu;
}

# Генерация сложного меню из 2 уровней. По умолчанию ссылка активной страницы выделяется классом "active"
function GetComplexMenuItems($page, $menu_items, $category = null)
{
	global $config;
	$menu = '';
	$category = ($category != null) ? $category . '/' : '';

	foreach ($menu_items as $i => $item)
	{
		if (isset($item[3]) && is_array($item[3]))
		{
			if ($category . $page == $item[0])
				$menu .= '<li class="active"><a href="' . $config['sitelink'] . $item[0] . '.html" title="' . $item[2] . '">' . $item[1] . '</a></li>';
			else
				$menu .= '<li><a href="' . $config['sitelink'] . $item[0] . '.html" title="' . $item[2] . '">' . $item[1] . '</a></li>';

			$menu .= '<ul class="nav nav-list">';

			foreach ($item[3] as $submenu_item)
			{
				if ($category . $page == $submenu_item[0])
					$menu .= '<li class="active"><a href="' . $config['sitelink'] . $submenu_item[0] . '.html" title="' . $submenu_item[2] . '">' . $submenu_item[1] . '</a></li>';
				else
					$menu .= '<li><a href="' . $config['sitelink'] . $submenu_item[0] . '.html" title="' . $submenu_item[2] . '">' . $submenu_item[1] . '</a></li>';
			}

			$menu .= '</ul>';
		}
		else
		{
			if ($page == $item[0])
				$menu .= '<li class="active"><a href="' . $config['sitelink'] . $item[0] . '.html" title="' . $item[2] . '">' . $item[1] . '</a></li>';
			else
				$menu .= '<li><a href="' . $config['sitelink'] . $item[0] . '.html" title="' . $item[2] . '">' . $item[1] . '</a></li>';
		}
	}

	return $menu;
	
}
# Генерация сложного меню. По умолчанию ссылка активной страницы выделяется классом "active". Родительская ссылка выделяется также классом "parent".
function GetMenuItemsU($page, $menu_items, $category = null)
{
	global $config;
	$category = ($category != null) ? $category . '/' : '';
	$menu = '';	
	$s = 1;
	$k = $sort = 0;
	$level = $parent = $sort1 = array();
	$tmp_item[$k] = (isset($menu_items)) ? $menu_items : '';
	while (isset($tmp_item[$k]))
	{
		foreach ($tmp_item[$k] as $j => $item)
		{				
			if ($category . $page == $item[0])
			{
				$active[$sort] = true;
				if (isset($parent[$k]) && $parent[$k] >= 0)
					$active[$parent[$k]] = true;
			}
			else $active[$sort] = false;

			$temp_menu_item[$sort] = '<a href="' . $config['sitelink'] . $item[0] . '.html" title="' . $item[2] . '">' . $item[1] . '</a>';
			#массив предков
			$temp_parent[$sort] = $k;
			#массив уровней 1
			if (!isset($lvl[$k]))
				$lvl[$k] = 0;
			#массив с элементами субменю для следующих итераций
			if (isset($item[3]) && is_array($item[3]))
			{
				$tmp_item[$s] = $item[3];
				$lvl[$s] = $lvl[$k] + 1;					
			}
			#массив уровней 2
			$level[$sort] = $lvl[$k];
			#определение предка элемента
			$parent[$s]	= (isset($tmp_item[$s])) ? $sort : 0;

			$s = (isset($tmp_item[$s])) ? $s + 1 : $s;
			#генерируем сортирующий массив
			if (isset($parent[$k]) && $parent[$k] >= 0)
			{			
				$off = array_search($parent[$k], $sort1) + $j + 1;
				array_splice($sort1, $off, 0, $sort);									
			}
			else
				$sort1[] = $sort;
			
			$sort++;
		}
		$k++;
	}
	$op = array();
	
	foreach($sort1 as $i => $key)
	{
		if ($i > 0 && $temp_parent[$sort1[$i]] > $temp_parent[$sort1[$i - 1]])
		{
			$menu .= '<ul class="nav nav-list">';
			$op[] = $sort1[$i - 1];
		}
		if ($active[$key])
			$menu .= '<li class="active">' . $temp_menu_item[$key] . '</li>';
		else
			$menu .= '<li>' . $temp_menu_item[$key] . '</li>';
		$j = $temp_parent[$sort1[$i]];
		$k = (isset($sort1[$i + 1])) ? $sort1[$i + 1] : $sort1[$i];
		$j = $level[$sort1[$i]];
		$k = (isset($sort1[$i + 1])) ? $sort1[$i + 1] : 0;
		$c = count($op);
		while ($j > $level[$k] || ($c > 0 && $i == count($sort1[$i]) - 1))
		{
			$menu .= '</ul>';				
			$j--;
			$c--;
			array_pop($op);
		}
	}
	return $menu;
}

# Функция HTTP авторизации. Логин и пароль задаются в параметрах
function CheckLogin($login, $password)
{
	$login_successful = false;	

	# Проверка логина и пароля
	if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']))
	{
		if ($_SERVER['PHP_AUTH_USER'] == $login && $_SERVER['PHP_AUTH_PW'] == $password)
		{
			$login_successful = true;
		}
	}

	# Если юзер не залогинен
	if (!$login_successful)
	{
		# Форма авторизации
		header('WWW-Authenticate: Basic realm="Enter login and password"');
		header('HTTP/1.0 401 Unauthorized');
	}
	else
	{
		return true;
	}
}

# Генерация антиспама
function GenerateAntispam($secret)
{
	return md5('s' . date("Y-m-d") . 'p' . date("d-m-Y") . 'a' . $secret . 'm');
}

# Проверка антиспама
function CheckSpam($antispam, $secret)
{
	return (md5('s' . date("Y-m-d") . 'p' . date("d-m-Y") . 'a' . $secret . 'm') == $antispam);
}

# Валидация формы обратной связи (обязательные поля)
function ValidateFeedbackForm($email, $name, $topic, $message)
{
	global $config;

	$name = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW);
	$topic = filter_var($topic, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW);
	$message = filter_var($message, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW);

	if (empty($name))
		return $config['form']['emptyName'];
	elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
		return $config['form']['emptyEmail'];
	elseif (empty($topic) && $config['form']['feedback']['subject'] == true)
		return $config['form']['emptyTopic'];
	elseif (empty($message))
		return $config['form']['emptyMessage'];
	else
		return false;
}

# Подготовка письма обратной связи
function PrepareFeedbackEmail($fromEmail, $content, $subject, $fromName)
{
	ob_start();
	include_once dirname(__FILE__) . '/template/email/feedback.inc.php';
	return ob_get_clean();
}

# Отправка письма
function SendEmail($toEmail, $fromEmail, $subject, $content, $from = null, $encoding = 'utf-8')
{
	# Если от кого не указано, подставляем робота :)
	if ($from == null)
		$from = 'Robo';

	# Обработка темы
	$subject = "=?$encoding?b?" . base64_encode($subject) . "?=";
	# Формирование заголовков
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=$encoding\r\n";
	$headers .= "From: =?$encoding?b?" . base64_encode($from) . "?= <" . $fromEmail . ">";

	return (mail($toEmail, $subject, $content, $headers));
}

# Обработка текста для сохранения в базу данных или отправки по почте
function ProcessText($text)
{
	$text = trim($text); # Удаляем пробелы по бокам
	$text = stripslashes($text); # Удаляем слэши, лишние пробелы и переводим html символы
	$text = htmlspecialchars($text); # Переводим HTML в текст
	$text = preg_replace("/ +/"," ", $text); # Множественные пробелы заменяем на одинарные
	$text = preg_replace("/(\r\n){3,}/","\r\n\r\n", $text); # Убираем лишние пробелы (больше 1 строки)
	$text = str_replace("\r\n","<br>", $text); # Заменяем переводы строк на тег

	return $text; # Возвращаем переменную
}

function GetBlock($page_blocks, $block_name, $block)
{	
	if (!empty($page_blocks) && !empty($block_name) && !empty($block))
	{		
		$tmp = explode(', ', $page_blocks);
		foreach ($tmp as $i)
		{
			if ($i == $block_name)
				return $block;
		}
	}
	return;
}
# Выборка шаблонов
function GetTemplates()
{
	$path = dirname(__FILE__) . '/../template/';
	$templates = array();

	# Парсим папку templates
	$handle = opendir($path);

	# Выбираем массив шаблонов
	if ($handle != false)
	{
		while (($file = readdir($handle)) !== false)
		{
			if ((strpos($file, '.')>0) && $file != '..' && $file != '.' && $file != 'blocks.inc.php' && $file != 'menu.inc.php')
			{
				$i = strtok($file, '.');
				$templates[] = $i;
			}
		}

		closedir($handle);
	}
	
	# Сортируем массив
	if(!empty($templates))
		natsort($templates);
	else
		$templates =false;
	return $templates;
}