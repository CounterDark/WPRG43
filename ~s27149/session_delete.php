<?php
//For debug only
session_start();
error_log('Destroying session: ' . session_id());

session_unset();

if (ini_get("session.use_cookies")) { 
    $params = session_get_cookie_params(); 
    setcookie(session_name(), '', time() - 42000, 
        $params["path"], $params["domain"], 
        $params["secure"], $params["httponly"] 
    ); 
} 
  
// Finally, destroy the session. 
session_destroy();
?>