<?php
session_start();

if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
}

header("Location: index.php");
