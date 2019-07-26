<?php

$router = $di->getRouter();

// Define your routes here

$router->add('/', ['controller' => 'index', 'action' => 'index']);

$router->add('/login', ['controller' => 'login', 'action' => 'index']);
$router->add('/registration', ['controller' => 'registration', 'action' => 'index']);

$router->add('/other', ['controller' => 'other', 'action' => 'index']);

$router->add('/question-group/([0-9]+)', 
	[
		'controller' => 'questiongroup', 
		'action' => 'index', 
		'id' => 1
	]
);

$router->add('/question-group-detailed/([0-9]+)',
	[
		'controller' => 'questiongroupdetailed', 
		'action' => 'index', 
		'id' => 1
	]
);

$router->add('/other-question-group-detailed/([0-9]+)', 
	[
		'controller' => 'otherquestiongroupdetailed', 
		'action' => 'index', 
		'id' => 1
	]
);

$router->add('/question/([0-9]+)/([0-9]+)',
	[
		'controller' => 'question', 
		'action' => 'index', 
		'question_group_id' => 1,
		'question_id' => 2,
	]
);

$router->handle();
