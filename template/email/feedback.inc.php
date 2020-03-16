<p><strong>Имя:</strong> <?= $fromName ?></p>
<p><strong>E-mail:</strong> <?= $fromEmail ?></p>
<p><strong>Тема письма:</strong><br><?= $subject ?></p>
<p><strong>Комментарий:</strong><br><?= $content ?></p>
<p><strong>Данные отправки:</strong><br>
<?= date("d.m.Y") ?><br>
<?= $_SERVER['REMOTE_ADDR'] ?></p>