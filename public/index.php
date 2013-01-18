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

with('/poems',function() use ($view_data) {
	respond('GET', '/?', function($request, $response)  use ($view_data) {
		$view_data['contents'] = __DIR__ . '/../templates/pages/poem_index.phtml';
		$view_data['index'] = new Anontate_Index('poems');
		$response->render(__DIR__ . '/../templates/main.phtml', $view_data);
	});
	respond('GET', '/new', function($request, $response)  use ($view_data) {
		$view_data['contents'] = __DIR__ . '/../templates/pages/poem_new.phtml';
		$response->render(__DIR__ . '/../templates/main.phtml', $view_data);
	});
	respond('POST', '/new', function($request, $response)  use ($view_data) {
		$request->validate('name', 'What\'s the name?')->isAlnum();
		$request->validate('poet', 'Who is the poet?')->isAlpha();
		$request->validate('type', 'What\'s the type?')->isAlpha();
		$request->validate('lines', 'What\'s the poem?')->notNull();
		$poem = new Anontate_Poem;
		$poem->name = $request->name;
		$poem->annotations->poem_name = $request->name;
		$poem->poet = $request->poet;
		$poem->type = $request->type;
		$lines = explode("\n", $request->lines);
		foreach($lines as $line) {
			$poem->lines[]['text'] = $line;
		}
		$poem->save();
		$response->redirect('/poems/'.$request->name);
	});
	respond('GET', '/[:name]', function($request, $response)  use ($view_data) {
		$view_data['contents'] = __DIR__ . '/../templates/pages/poem.phtml';
		$view_data['poem'] = new Anontate_Poem(urldecode($request->name));
		$response->render(__DIR__ . '/../templates/main.phtml', $view_data);
	});
	respond('POST', '/[:name]', function($request, $response) {
		if($request->name == "new") { return false; }
		$request->validate('line', 'Please select a line')->isInt();
		$request->validate('text', 'Please enter some tm ext')->notNull();
		$poem = new Anontate_Poem(urldecode($request->name));
		$poem->annotations->add_annotation($request->line, $request->text);
		$poem->save();
		$response->redirect('/poems/'.$request->name);
	});
});


dispatch();

?>