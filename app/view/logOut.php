<?php
session_start();
session_unset();
session_destroy();

header("location: /mvc-login/?loggedOut=true");
exit();
?>