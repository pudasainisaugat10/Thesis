<?php
// Unset and destroy the current session and then redirect to the login page.

	session_unset();
	session_destroy();
	header('Location:?page=login');
?>