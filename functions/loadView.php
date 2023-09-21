<?php
// Function to load a view file, extract temporary variables, and return the content.

function loadView($file, $tempVars)
{
	extract($tempVars);
	ob_start();
	require $file;
	$content = ob_get_clean();
	return $content;
}
