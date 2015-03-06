<?php
 require_once __DIR__.'/vendor/autoload.php';
 
 $app = new Silex\Application();
 // Please set to false in a production environment
 $app['debug'] = true;
 
 $todoItems = simplexml_load_file("todoitems.xml");
 
 $app->get('/', function() use ($todoItems) {
     $output = '';
	 foreach ($todoItems as $item) {
	    $output .= $item->text . " ";
		$output .= $item->alreadyDone;
		$output .= '<br />';
	 }
     return $output;
 });


$app->run();
