<?php
include_once('pdo.php');
session_destroy();
header('Location: login.php');