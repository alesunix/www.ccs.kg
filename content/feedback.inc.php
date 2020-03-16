<?php

# Данные о странице
$title = 'Обратная связь';
$keywords = 'Обратная связь';
$description = 'Обратная связь';
$template = 'info';
$page_blocks = 'contact, info';

# Содержание страницы
$content = "Если Вас интересуют какие либо вопросы, Вы можете написать нам письмо!";

#script start
# Обработка отправки формы
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($form['sent']))
{
    # Проверка на спам
    $spam = CheckSpam($_POST['nospam'], $config['secretWord']);

    # Обработка и сохранение данных в переменные
    $form['email'] = trim($_POST['email']);
    $form['name'] = ProcessText($_POST['name']);
    $form['subject'] = (isset($_POST['subject'])) ? ProcessText($_POST['subject']) : '';
    $form['text'] = ProcessText($_POST['text']);

    # Валидация данных
    $validate = ValidateFeedbackForm($form['email'], $form['name'], $form['subject'], $form['text']);

    # Подготовка сообщения к отправке
    $form['content'] = PrepareFeedbackEmail($form['email'], $form['text'], $form['subject'], $form['name']);

    if (!$spam)
    {
        $form['message'] = $config['form']['isSpam'];
    }
    elseif ($validate)
    {
        $form['message'] = $validate;
    }
    # Отправка письма
    elseif (!SendEmail($config['email']['receiver'], $form['email'], $config['email']['subject'], $form['content'], $form['name']))
    {
        $form['message'] = $config['form']['notSent'];
    }
    # Подтверждение отправки
    else
    {
        $form = array();
        $form['sent'] = 1;
    }
}

# Если письмо отправлено, выводим сообщение об этом
if (isset($form['sent']))
{
    $content .= '<p class="attention">' . $config['form']['feedbackSent'] . '</p>
	<meta http-equiv="refresh" content="5; url=' . $config['sitelink'] . '">';
}
# Иначе выводим форму
else
{
    # Генерируем антиспам
    $antispam = GenerateAntispam($config['secretWord']);

    # Шаблон вывода формы
	ob_start();
    include_once $path . 'template/email/form.inc.php';
	$content .= ob_get_clean();
}
#script end