<?php
session_start();
session_unset();
session_destroy();
echo "{\"logout\":\"". true ."\"}";
// header("Location: index.html");
?>