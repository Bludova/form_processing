<?php
$upload ='tests/';
if (!is_dir($upload)){
    echo "Не создана папка tests в текущей директории!";
    exit();
  }
$list=scandir($upload);
array_shift($list);
array_shift($list);

?>
<!DOCTYPE html>
  <html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>Список загруженных тестов</title>
  </head>
  <body>
<h1>Список загруженных тестов</h1>
<?php

    ?>

      <form enctype="multipart/form-data" action="./test.php" method="get">
             <?php
              if(isset($list)) {
                foreach ($list as $filename => $values) { ?>
                <label><input type="radio" name="test" value='<?=$list[$filename];?>'><?=$list[$filename];?></label>
          <?php }
              } else echo 'Тесты не загружены';
?>
        <input type="submit" value="Пройти тест!">
      </form>
<hr>
<a href="./admin.php">Загрузить тест!</a>
  </body>
</html>
