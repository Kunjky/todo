 <?php

 $router->get('', 'TaskController@home');
 $router->get('calendar', 'HomeController@calendar');

 // Tasks
 $router->get('tasks', 'TaskController@index');
 $router->post('tasks/create', 'TaskController@store');
 $router->get('tasks/edit', 'TaskController@edit');
 $router->post('tasks/update', 'TaskController@update');
 $router->post('tasks/delete', 'TaskController@delete');
