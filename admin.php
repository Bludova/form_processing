<!DOCTYPE html>
  <html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>Обработка форм</title>
  </head>
  <body>
<h1>Загрузить JSON-файл c тестом.</h1>


<form enctype="multipart/form-data" action="" method="POST">
Загрузить JSON-файл <input name="userfile" type="file">
<br>
<input type="submit" value="Отправить">
</form>
<?php
if(isset($_FILES['userfile'] ['name']) && !empty($_FILES['userfile'] ['name']))
{
  if($_FILES['userfile'] ['error'] == UPLOAD_ERR_OK &&
    move_uploaded_file($_FILES['userfile'] ['tmp_name'], $_FILES['userfile'] ['name']))
  {
    echo "Файл с текстом загружен! <br>";
  }else 
  {
    echo " Ошибка: Файл с текстом не загружен! <br>";

  }
}

?>
<hr>
<a href="./list.php">Выбрать тест! </a>
  </body>
</html>
