<?php
$upload ='tests/';
if (!is_dir($upload)) {
    echo 'Папки не существует';
    exit();
  }


$filelist = glob($upload."*.json");
$tests = $_GET['test'];
$test = $upload.$tests;

$error_check = array_search($test, $filelist);
if(empty($error_check)){
echo "Не нашел фийл с тестом";
   http_response_code(404);
      exit();
}

$json = file_get_contents($upload.$_GET['test']);
$data = json_decode($json, true);

?>
<!DOCTYPE html>
  <html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>Список загруженных тестов</title>
    <style>
   .error {
    color: red;
    font-size: 120%;
   }
   .correctly {
    color: #00A72A;
    font-size: 120%;
   }
  </style>
  </head>
  <body>
    <h1>Пройдите тест</h1>

    <form action="" method="POST">

    <?php

    for ($i=0; $i < count($data); $i++) {

      foreach ($data[$i] as $keys){
    $correct_int = FILTER_VALIDATE_INT;
    $correct_answer = filter_var($keys, $correct_int);

    if (!$correct_answer and !is_array($keys)){


        ?>

        <legend><?=$keys;?></legend>
       <?php
       }

        if(is_array($keys)){
            foreach ($keys as $key_array =>$answers){
              ?>
              <input type="radio" name='<?=$i;?>' value='<?=$key_array; ?>'><?= $answers;?>
              <?php
            }
          }
          if (array_key_exists('answer', $data[$i])) { ?>
          <?php
        }
      }
    }
    ?>
    <p><input type="submit" name="submit" value='Отправить'></p>
  </form>
  <hr>
  <?php
  if (isset($_POST)){
    for ($i=0; $i < count($data); $i++) {
      $question = $data[$i]['question'];

      if (isset($_POST[$i])) {
        if ($_POST[$i] == $data[$i]['correct_answer']){
      ?>
      <span class="correctly">На вопрос:  <?=$question;?>  Вы ответили верно! </span> <br>
    <?php
      } else {
       ?>
         <span class="error">Вы ответили неправельно на <?=$question;?> вопрос!</span><br>
         <?php
      }
    }
  }
}

?>
<a href="list.php">Выбор тестов</a>
</body>
</html>
