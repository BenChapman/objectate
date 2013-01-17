<?php 

// Load all the things
require_once __DIR__ . '/../loader.php';

// Load Klein.php
require_once __DIR__ . '/../libs/klein.php';

respond('GET', '/', function($request, $response) {
	$view_data['contents'] = __DIR__ . '/../templates/pages/home.phtml';
	$response->render(__DIR__ . '/../templates/main.phtml', $view_data);
});

dispatch();

?>