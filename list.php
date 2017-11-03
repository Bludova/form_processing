<!DOCTYPE html>
  <html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>Список загруженных тестов</title>
  </head>
  <body>
<h1>Список загруженных тестов</h1>

      <form enctype="multipart/form-data" action="test.php" method="get">
          <legend>Список загруженных тестов</legend>
            <?php 

$number = 0;
$filelist = glob("*.json");
 
foreach($filelist as $i => $filename) {
    $number++;
    $name = basename($filename);

?>


          <label><input type="radio" name='<?="$number"?>' value='<?="$filename"?>'>

          <?php echo  "№$number $filename " ;
}
?>
        </label>
        <input type="submit" value="Пройти тест!">
      </form>


<hr>
<a href="admin.php">Загрузить тест!</a>
  </body>
</html>
