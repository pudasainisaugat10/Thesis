<?php
$category = new DatabaseTable('provider');

if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
	$category->delete('id', $_GET['did']);
	echo '<script language="javascript">';
    echo 'alert("Provider Deleted..")';
    
    echo '</script>';
	header('location:?page=provider');

}


