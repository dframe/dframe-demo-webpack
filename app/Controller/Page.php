<?php
/**
 * Project Name
 * Copyright (c) Firstname Lastname
 *
 * @license http://yourLicenceUrl/ (Licence Name)
 */

namespace Controller;
use Dframe\Config;
use Dframe\Router\Response;

/**
 * Here is a description of what this file is for.
 *
 * @author First Name <adres@email>
 */

class PageController extends \Controller\Controller
{
    /** 
     * initial function call working like __construct
     */
    public function init()
    {

    }

    public function error()
    {
        $view = $this->loadView('Index');

        $errorsTypes = array('404');
        if (!isset($_GET['type']) OR !in_array($_GET['type'], $errorsTypes)) {
            return $this->router->redirect(':task/:action?task=page&action=index');
        }

        return Response::create($view->fetch('errors/'.$_GET['type']))->status($_GET['type']);
        
    }

    public function index() 
    {
        $view = $this->loadView('Index');
        $view->assign('contents', 'Example assign');

        return $view->render('index');
    }


    public function responseExample() 
    {
        $view = $this->loadView('Index');
        $view->assign('contents', 'Example assign');

        return Response::create($view->fetch('index'));
    }


    public function json() 
    {
        return Response::renderJSON(array('return' => '1')); 
    }

    /**
     * Catch-all method for requests that can't be matched.
     *
     * @param  string $method
     * @param  array  $parameters
     * @return Response
     */

    public function __call($method, $test)
    {

        $smartyConfig = Config::load('view/smarty');
        $view = $this->loadView('Index');

        $patchController = $smartyConfig->get('setTemplateDir', APP_DIR.'View/templates').'/page/'.htmlspecialchars($_GET['action']).$smartyConfig->get('fileExtension', '.html.php');
        
        if (!file_exists($patchController)) {  
            return $this->router->redirect(':task/:action?task=page&action=index');
        }

        return Response::create($view->fetch('page/'.htmlspecialchars($_GET['action'])));
        
    }
    
}
