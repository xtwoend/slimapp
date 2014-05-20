<?php


/**
* path dir
*
*/

define('BASE_PATH', __DIR__.'/../../');
define('VENDOR_PATH', __DIR__.'/../../vendor/');
define('APP_PATH', __DIR__.'/../');
define('PUBLIC_PATH', __DIR__.'/../../public/');


$path_config = APP_PATH. '/config';

/* class config for read config */

$config = new Config($path_config);

$appconfig['app'] = $config->get('app');
$appconfig['app']['cookies'] = $config->get('cookies');
$appconfig['app']['database'] = $config->get('database');
$appconfig['app']['templates.path'] = $config->get('view.views');

$appconfig['twig']['debug'] = $config->get('view.debug');
$appconfig['twig']['cache'] = $config->get('view.cache');

/**
 * Initialize Slim application
 */
$app = new \Slim\Slim($appconfig['app']);

$app->view->parserOptions = $appconfig['twig'];
$app->view->parserExtensions = array(
    new \Slim\Views\TwigExtension(),
);

/**
 * Initialize Slim ServiceManager
 */
$services = new \SlimServices\ServiceManager($app);
$services->registerServices($config->get('app.providers'));

/**
 * Initialize the Slim Facade class
 */
\SlimFacades\Facade::setFacadeApplication($app);
\SlimFacades\Facade::registerAliases($config->get('app.aliases'));


/**
 * if called from the install script, disable all hooks, middlewares, and database init
 */
if(!defined('INSTALL')){
    /**
     * Start the route
     */
    require APP_PATH.'filters.php';
    require APP_PATH.'routes.php';
}

return $app;



//include class
class Config {

  
    /**
     * All of the items from the config file that is loaded
     *
     * @var array
     */
    public $items = array();

    /* 
    * path config folder
    */ 
    protected $path;
    

    public function __construct($path)
    {
      $this->path = $path;
    }


    public function getPath()
    {
      return $this->path;
    }

    /**
     * Loads the config file specified and sets $items to the array
     *
     * @param   string  $filepath
     * @return  void
     */
    public function load($filepath)
    {
        $this->items = include( $this->getPath() .'/'. $filepath . '.php');
    }

    /**
     * Searches the $items array and returns the item
     *
     * @param   string  $item
     * @return  string
     */
    public function get($key = null)
    {
        $input = explode( '.', $key );
    
    $filepath = array_shift( $input );
    
        $this->load($filepath);

        $key = strval(array_shift($input));
        if($key){
          return $this->items[$key];
        }
        return $this->items;
    }

}