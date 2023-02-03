<?php
session_start();
session_unset();
session_destroy();
header("Location: /global_news/views/admin/login.php");