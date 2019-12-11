<?php
require_once('../../helpers/const.php');
session_start();

session_destroy();

header("location: ../../index.php");
