<?php
require_once('../helpers/const.php');
require_once('../helpers/db.php');
// dd($_SESSION['auth']);
if ($_SESSION['auth'] == null) {
    header('location: ../login/');
} elseif ($_SESSION['auth']['role'] == 1) {
    header("location:" . BASE_URL);
} else {
    header('location: ./users');
}
