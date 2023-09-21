<?php
require 'database/dbconnect.php';
require 'functions/loadView.php';
require 'classes/DatabaseTable.php';

// Determines the page to be shown using the 'page' argument in the URL and checks to see whether the 'adminlogin' session variable is set.
session_start();
if (isset($_SESSION['adminlogin'])) {
	$page = (!empty($_GET['page'])) ? $_GET['page'] : 'home';
	$pageView = 'pages/admin/' . $page . '.php';
}

// Choose the page to display based on the URL's 'page' parameter if the 'adminlogin' session is not set.
else {
	$page = (!empty($_GET['page'])) ? $_GET['page'] : 'home';
	$pageView = 'pages/' . $page . '.php';
}

// Create temporary variables for "title" and "content" and include the given page view file if it already exists.
if (file_exists($pageView)) {
	require $pageView;
	$tempVars = [
		'title' => $title,
		'content' => $content
	];
	// Conditionally load different views based on the 'adminlogin' session and 'page' variable.

	if (isset($_SESSION['adminlogin'])) {
		echo loadView('views/admin/layout.php', $tempVars);
	} else {
		if ($page == 'login' || $page == 'register') {
			echo loadView('views/layout1.php', $tempVars);
		} else {
			echo loadView('views/layout.php', $tempVars);
		}
	}
	//show the errors messgae
} else {
	echo "<h1>Error: Page Not Found</h1>";
}
