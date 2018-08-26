<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Use this file to register new routes for your application.
|
*/


route('/','Welcome::index');


route('/view',function(){
    return 'Just a single view';
});


route()->middleware(['session','output:json'],function(){

    route('/session','Welcome::index');

    // double check middleware only adds once
    route()->middleware(['session','output:json','session'],function(){
        route('/doubleware','Welcome::index');
    });

});


route()->prefix('/one',function(){

    route('/two','Welcome::index');

    // double check middleware only adds once
    route()->prefix('/two',function(){

        route()->middleware(['session','output:json',],function(){
            route('/three','Welcome::index');
        });
    });

});





// TEST 1
// domain allowed : http://basephp-routing/
route()->domain('basephp-routing',function(){
    route('/domainallowed1','Welcome::index');

    // run middleware on a route within allowed domain
    route()->middleware(['session','output:json'],function(){
        route('/domainallowedmiddleware','Welcome::index');
    });

});

// TEST 2
// domain allowed : http://basephp-routing/
route()->domain('http://basephp-routing/',function(){
    route('/domainallowed2','Welcome::index');
});

// TEST 3
// domain not allowed : http://doesnotexist/
route()->domain('doesnotexist',function(){
    route('/domainallowed3','Welcome::index');
});
