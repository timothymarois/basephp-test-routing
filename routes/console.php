<?php

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| Use this file to register new routes for your application.
|
*/


route('/viewconsole',function(){
    return "ONLY WORKS IN THE CONSOLE (CLI)\n";
})->console();

route()->console(function(){
    route('/console',function(){
        return "ONLY WORKS IN THE CONSOLE (CLI)\n";
    });

    route()->prefix('/console',function(){
        route('/two',function(){
            return "TWO: ONLY WORKS IN THE CONSOLE (CLI)\n";
        });
    });
});
