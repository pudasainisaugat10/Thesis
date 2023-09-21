<?php
$category = new DatabaseTable('users');

if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
	$category->delete('id', $_GET['did']);
	header('location:?page=users');
	echo '<script language="javascript">';
    echo 'alert("User deleted")';
    
    echo '</script>';
}


