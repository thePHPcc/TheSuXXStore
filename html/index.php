<?php

/**
 * This code is part of the Suxx security demo application
 *
 * *** DO NOT USE IN ANY TYPE OF PRODUCTION ***
 *
 * The application is stripped down and contains various security issues to be found
 * by course attendees. It is not meant to be used as an actual shop application or a
 * base for one.
 *
 * @author Arne Blankerts <arne@thephp.cc>
 * @copyright 2011 thePHP.cc - the PHP consulting company, Germany
 *
 */

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors',1);
define('DSN', 'mysql://root@127.0.0.1/suxx');

require __DIR__ . '/autoload.php';
session_start();

$request  = new SuxxRequest($_REQUEST, $_SESSION);
$response = new SuxxResponse();
$factory  = new SuxxFactory();

$suxx = new SuxxFrontController($request, $response, $factory);
$view   = $suxx->execute(isset($_GET["controller"]) ? $_GET['controller'] : 'home');

echo $view->render($request, $response);
