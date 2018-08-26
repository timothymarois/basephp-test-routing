<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Use this file to register new routes for your application.
|
*/


route()->web(function(){

    route('/','Welcome::index')->name('home');
    route('/routes','Welcome::routes');

    route('/view',function(){
        return 'Just a single view';
    });



    route('/web',function(){
        return 'ONLY WORKS IN THE BROWSER (WEB HTTP)';
    });

    route()->console(function(){
        route('/web/console',function(){
            return 'ONLY WORKS IN THE CONSOLE';
        });
    });


    route()->middleware(['session','output:json'],function(){

        route('/session','Welcome::index')->name('mysession');

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




    // REDIRECT TEST
    // Named Routes
    route('/redirect',function(){
        route()->to('mysession');
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


});












/*
route()->middleware(['test1','test2'],function(){

    route()->middleware(['test3'],function(){

        route()->prefix('/level',function(){
            route('/one','Welcome::index');
        });

        route('/test123','Welcome::index');
    });

    route('/test12','Welcome::index');
});


route('/nothing','Welcome::index');


route()->middleware('ware0',function(){
    route()->prefix('p1',function(){

        route()->middleware('ware1',function(){
            route('/pend','Welcome::index');
            route('/pend2','Welcome::index');

            route()->prefix('p2',function(){
                route('/pending','Welcome::index');
            });

        });

    });
});

route()->domain('onlinefun.com',function(){

    route()->domain('test.onlinefun.com',function(){
        route('/another/nothing','Welcome::index');
    });

    route('/another/single','Welcome::index');
});
*/
/*

route()->prefix('/api',function(){

    route()->prefix('v1',function(){

        route('maps',function(){
            return 'API';
        });

    });

});
*/
