<?php
    session_start();
    session_destroy();
    setcookie( session_name(), '', time()-9999999, '');
?>
<meta http-equiv="refresh" content="0;url=login.php">
