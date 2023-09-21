<?php 
// This PHP code includes different pages based on the 'page' parameter in the URL and loads the corresponding view using 'loadView'.
	require '../database/dbconnect.php';
	require '../functions/loadView.php';
	require '../classes/DatabaseTable.php';
	

	$page = (!empty($_GET['page']))?$_GET['page']:'main';

		$pageView = '../pages/'. $page. '.php';
		if(file_exists($pageView)){
				require $pageView;
					$tempVars = [
						'title' => $title,
							'class' =>$class,
							'content' => $content
						];
						
				echo loadView('../views/layout1.php', $tempVars);
		}
		else{
			echo "<h1>404: Page Not Found</h1>";
		}

?>

