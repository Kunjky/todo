 <?php

 // $router->get('', 'HomeController@home');
 $router->get('calendar', 'HomeController@calendar');

 // Tasks
 $router->get('', 'TaskController@index');
 $router->post('tasks/create', 'TaskController@store');
