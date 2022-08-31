<?php

if(isset($_GET['404'])) {
  header('Location: templates/404.php');
} else {
  header('Location: templates/index.php');
}
