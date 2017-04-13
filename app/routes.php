<?php
use NoahBuscher\Macaw\Macaw as Route;
Route::get('test', 'App\Controller\TestController@test');
Route::get('(:all)', function($fu) {
/*    echo '未匹配到路由<br>'.$fu;*/
});

Route::dispatch();