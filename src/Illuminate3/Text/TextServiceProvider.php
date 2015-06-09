<?php namespace Illuminate3\Text;

use Illuminate\Support\ServiceProvider;

class TextServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->package('text', 'text');
	}
    
	/**
	 *
	 * @return void
	 */
	public function boot()
	{        
        $this->app->make('formbuilder')->register('wysiwyg', 'Illuminate3\Text\FormElement\Wysiwyg');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('text');
	}

}