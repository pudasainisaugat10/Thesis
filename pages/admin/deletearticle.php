<?php
$category = new DatabaseTable('article');

if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
	$category->delete('id', $_GET['did']);
	header('location:?page=article');
	echo '<script language="javascript">';
    echo 'alert("Article Deleted")';
    
    echo '</script>';
}


