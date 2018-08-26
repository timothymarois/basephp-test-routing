<?php

namespace App\Controllers;

use Base\Routing\Controller;

class Welcome extends Controller
{

	public function index()
	{
		$providers = app()->getActiveServiceProviderList();
		$middleware = app()->router->getActiveMiddlewareList();

		return view('welcome',[
			'providers' => $providers,
			'middleware' => $middleware,
			'uri' => app()->request->url->getPath(),
			'route' => app()->request->route
		]);
	}



	public function routes()
	{
		print_r(app()->router->routes()->all());
	}

}
