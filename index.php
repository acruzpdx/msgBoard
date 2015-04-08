<?php
 /**
 * msgBoard - an MVC demo project
 * 
 * This is the start of the msgBoard code.
 * It's purpose is to extract the requested
 * route, or if one is not available, to
 * default to the main route and pass that
 * information to the App construcor.
 *
 * Note that the route is expected to be in
 * the query string appended to the call to
 * this file, e.g. index.php?rt=main.
 * This is set up by the .htaccess file which
 * converts pretty URL requests into calls to
 * index.php in the proper format. So if the
 * .htaccess file isn't available or working
 * properly, this won't work.
 *
 * After the App instance is created, any
 * form data is passed to the App for 
 * processing.
 *
 * @author Agapito Cruz <agapito.cruz@gmail.com>
 * @package msgBoard
 * @copyright Agapito Cruz
 */

// *****************************************************************************
    require_once('lib/config.php');
    require_once(BASE_DIR .'class/App.php');
    if (!empty($_GET['rt'])) {
        $route = $_GET['rt'];
    } else {
        // redirect to main URL
        $route = 'main';
    }
    $app = new App($route);
    // if this is a form with data to
    // add to the database, pass it to
    // the App
    if (!empty($_POST['submit'])){
        //Bundle the form data
        $app->addData($_POST);
    }
    // start processing
    $app->doIt();
?>
