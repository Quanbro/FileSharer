<?php

include 'functions/functions.php';
session_destroy();
session_start();
header("Location: login.php");