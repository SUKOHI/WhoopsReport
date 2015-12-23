<?php namespace Sukohi\WhoopsReport;

use Illuminate\Support\ServiceProvider;

class WhoopsReportServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('whoops-report/whoops-report');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['whoops-report'] = $this->app->share(function($app)
		{
			return new WhoopsReport;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('whoops-report');
	}

}
