<?php

$url = $_GET['url'];

$data = json_decode(file_get_contents($url), true);

include('template.php');