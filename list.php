<!DOCTYPE html>
  <html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>Список загруженных тестов</title>
  </head>
  <body>
<h1>Список загруженных тестов</h1>


      <form enctype="multipart/form-data" action="./test.php" method="get">
          <legend>Список загруженных тестов</legend>
            <?php 

$number = 0;
$filelist = glob("*.json");
 
foreach($filelist as $i => $filename) {
   $number++;
    $name = basename($filename);

?>


          <label><input type="radio" name='<?="$number"?>' value='<?="$filename"?>'>


        <?= " № $number  " . $filename;?>
<?php
}
?>
        </label>
        <input type="submit" value="Пройти тест!">
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
<a href="./admin.php">Загрузить тест!</a>
  </body>
</html>
