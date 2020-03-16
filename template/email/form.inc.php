<h3 id="connect">Отправить сообщение</h3>
<script type="text/javascript">
	function form_validator(form)
	{
        if (form.name.value == '')
		{
			alert('Пожалуйста, укажите Ваше имя.');
			form.name.focus();
			return false;
		}
        if (form.email.value == '')
		{
			alert('Пожалуйста, укажите Ваш email адрес.');
			form.email.focus();
			return false;
		}
		<? if ($config['form']['feedback']['subject'] == true): ?>
        if (form.subject.value == '')
		{
			alert('Пожалуйста, укажите тему сообщения.');
			form.subject.focus();
			return false;
		}
		<? endif ?>
        if (form.text.value == '')
		{
			alert('Вы не заполнили текст сообщения.');
			form.text.focus();
			return false;
		}
        if (confirm('Проверьте ваши данные перед отправкой, чтобы мы могли с вами связаться. Всё верно?'))
			form.nospam.value='<?= (isset($antispam)) ? $antispam : '' ?>';
		else
			return false;

		return true;
	}
</script>
<noscript><p class="error">JavaScript в браузере отключён. Отправка не сработает.</p></noscript>
<? if (isset($form['message'])): ?>
<p class="error"><?= $form['message'] ?></p>
<? endif ?>
<form action="#connect" method="post" onsubmit="return form_validator(this);">
	<div class="row-fluid">
		<div class="span6">
			<div class="control-group">
				<label>Имя:</label>
				<div class="controls">
					<input type="text" name="name" class="span10" value="<?= (isset($form['name'])) ? $form['name'] : '' ?>">
				</div>
			</div>		
			<div class="control-group">
				<label>E-mail:</label>
				<div class="controls">
					<input type="text" name="email" class="span10" value="<?= (isset($form['email'])) ? $form['email'] : '' ?>">
				</div>
			</div>
		</div>
		<div class="span6">
			<div class="control-group">
				<label>Тема письма:</label>
				<div class="controls">
					<input type="text" name="subject" class="span10" value="<?= (isset($form['subject'])) ? $form['subject'] : '' ?>">
				</div>
			</div>
		</div>
	</div>
		<div class="row-fluid">
			<div class="control-group">
				<label class="control-label" for="page-parent">Сообщение:</label>
				<div class="controls">
					<textarea name="text" class="span11" rows="10"><?= (isset($form['text'])) ? $form['text'] : '' ?></textarea>
				</div>
			</div>
		</div>
		<p>
			<input type="hidden" name="nospam" value="">
			<input type="submit" name="send" class="btn" value="Отправить" title="Отправить сообщение">
		</p>
	
</form>