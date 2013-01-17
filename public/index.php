<?php 

// Load all the things
require_once __DIR__ . '/../loader.php';

// Load Klein.php
require_once __DIR__ . '/../libs/klein.php';

$lines = file(__DIR__ . '/../line_of_the_day.txt');
$view_data['lotd'] = $lines[array_rand($lines)];

respond('GET', '/', function($request, $response) use ($view_data) {
	$view_data['contents'] = __DIR__ . '/../templates/pages/home.phtml';
	$response->render(__DIR__ . '/../templates/main.phtml', $view_data);
});

respond('GET', '/poem/[:name]', function($request, $response)  use ($view_data) {
	$view_data['contents'] = __DIR__ . '/../templates/pages/poem.phtml';
	$view_data['poem'] = new Anontate_Poem(urldecode($request->name));
	$response->render(__DIR__ . '/../templates/main.phtml', $view_data);
});

dispatch();

?>