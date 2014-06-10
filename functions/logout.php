<?php
session_start();
session_destroy();
header("Location: ../index.html?q=2");
?>