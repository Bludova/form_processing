<?php
$nomTest = ($_GET);
foreach($nomTest as $i) {
}

$filelist = glob("*.json");
$json = file_get_contents(__DIR__ ."/$i");
$data = json_decode($json, true);
array_unshift($filelist, "1");
foreach($filelist as $is => $filename) {
    $name = basename($filename);

    if (array_key_exists(key($nomTest), $filelist)) {
    // "Массив содержит элемент key($nomTest).";
      break;
    } else {
        http_response_code(404);
        echo "файл теста не правильный";
        exit();
    }
}
if (empty($data["question_1"]) and empty($data["question_2"])) {
    echo "Файл теста содержит не правильную JSON структуру<br>";
    ?>
    <a href="list.php">Выбрать тест! </a>
    <?php
    exit();
}

$issues_1 = $data["question_1"];
$issues_2 = $data["question_2"];
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

    <form action=" " method="post">
        <fieldset name="q1">
          <legend><?= $issues_1["label"]; ?></legend>
          <label><input type="radio" name="q1" value='<?= $issues_1["option_1"];?>' ><?= $issues_1["option_1"]; ?></label>
          <label><input type="radio" name="q1" value='<?= $issues_1["option_2"];?>' ><?= $issues_1["option_2"]; ?></label>
          <label><input type="radio" name="q1" value='<?= $issues_1["option_3"];?>' ><?= $issues_1["option_3"]; ?></label>
          <label><input type="radio" name="q1" value='<?= $issues_1["option_4"];?>' ><?= $issues_1["option_4"]; ?></label>
        </fieldset>
        <fieldset name="q2">
          <legend><?= $issues_2["label"]; ?></legend>
          <label><input type="radio" name="q2" value='<?= $issues_2["option_1"];?>' ><?= $issues_2["option_1"]; ?></label>
          <label><input type="radio" name="q2" value='<?= $issues_2["option_2"];?>' ><?= $issues_2["option_2"]; ?></label>
          <label><input type="radio" name="q2" value='<?= $issues_2["option_3"];?>' ><?= $issues_2["option_3"]; ?></label>
          <label><input type="radio" name="q2" value='<?= $issues_2["option_4"];?>' ><?= $issues_2["option_4"]; ?></label>
        </fieldset>
        <input type="submit" value="Отправить">
      </form>
<?php

if(isset($_POST['q1']) && !empty($_POST['q1']))
{
 if($_POST['q1'] ==  $issues_1["result"]) 
  {
    echo "На вопрос: " .$issues_1["label"]."  ";
 ?> <span class="correctly"> Вы ответили верно! </span><?php echo "<br>";
  }else 
  {
   echo "На вопрос: " .$issues_1["label"]."  ";
    ?> <span class="error">Вы ответили неправельно!</span> Правельный ответ:"
   <?php echo $issues_1["result"]. " <br>" ;
  }
}

if(isset($_POST['q2']) && !empty($_POST['q2']))
{
 if($_POST['q2'] ==  $issues_2["result"]) 
  {
    echo "На вопрос: " .$issues_2["label"]."  ";
   ?><span class="correctly">Вы ответили верно!</span>.<?php echo "<br>";
  }else 
  {
   echo "На вопрос: " .$issues_2["label"]."  ";
   ?>"<span class="error">Вы ответили неправельно!</span> Правельный ответ:" <?php echo$issues_2["result"]. "<br>" ;
  }
}
?>
<hr>
 <a href="list.php">Выбрать тест! </a>
 <a href="admin.php">Загрузить тест! </a>
  </body>
</html>
