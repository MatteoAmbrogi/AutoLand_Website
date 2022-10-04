<?php
	require_once __DIR__ . "/config.php";
    session_start();
    // chiusura della sessione e reidirizzamento all index
    session_destroy();
    header("Location: ./../index.php");
    exit;
?>