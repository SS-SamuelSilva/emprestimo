<?php
session_start();
echo session_id();
session_unset();
session_destroy();
header('Location: index.php');
