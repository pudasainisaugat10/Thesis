<?php
$category = new DatabaseTable('events');

if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
	$category->delete('id', $_GET['did']);
	echo '<script language="javascript">';
    echo 'alert("Event Deleted..")';
    
    echo '</script>';
	header('location:?page=events');

}


