<?php
 /**
 * Controller.php -  Abstract parent class for all controllers.
 * 
 * Abstract base class with a few shared implemented methods that
 * all controllers use.
 *  
 * @author Agapito Cruz <agapito.cruz@gmail.com>
 * @package msgBoard
 * @copyright Agapito Cruz
 */

// *****************************************************************************
require_once('lib/config.php');
require_once(BASE_DIR .'class/Model.php');
abstract class Controller {
    ////properties
/**
 *
 * @var Model $model Object for accessing the database
 */
    protected $model    = null;
/**
 *
 * @var View $view Object for updating/displaying HTML
 */
    protected $view     = null;
/**
 *
 * @var array $formData $_POST array
 */
    protected $formData = null;
    ////methods
/**
 * Parent constructor - does nothing.
 *
 * @param array $paramArray values parsed from rt string
 */
    public function __construct($paramArray) {
    }
/**
 * Sets the view instance variable.
 *
 * @param View $view Newly created view object
 */
    public function setView($view) {
        $this->view = $view;
    }
/**
 * Sets the model instance variable
 *
 * @param Model $model Newly created model object.
 */
    public function setModel($model) {
        $this->model = $model;
    }
/**
 * Sets the formData instance variable.
 *
 * @param array $formData The $_POST array
 */
    public function addData($formData) {
        $this->formData = $formData;
    }
/**
 * Abstract method that each controller must provide.
 *
 * Each conscrete controller class must provide it's own instructions for 
 * processing the user requests.
 *
 */
    abstract public function doit();
}
?>
