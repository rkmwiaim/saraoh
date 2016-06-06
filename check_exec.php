<?php
  $target = $_POST['target'];
  $data1 = shell_exec("java -jar checker.jar ".$target);
  echo $data1;
?>
