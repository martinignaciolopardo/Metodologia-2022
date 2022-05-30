<?php


require_once "./Views/TurnsView.php";
require_once "./Models/TurnsModel.php";
require_once "./Helpers/AuthHelper.php";


class TurnsController
{

    private $model;
    private $view;
    private $authHelper;

    function __construct()
    {
        $this->model = new TurnsModel();
        $this->view = new TurnsView();
        $this->authHelper = new AuthHelper();
    }

    function showTurns()
    {
        $this->authHelper->checkLoggedIn();
        $this->authHelper->checkMedic();
        $id = $_SESSION['id'];
        if ($_GET['timeRange'] && isset($_GET['timeRange'])) {
            if ($_GET['timeRange'] == 'maniana') {
                $action = $this->model->showMorningTurns($id);  // verificar id medico
            }
            if ($_GET['timeRange'] == 'tarde') {
                $action = $this->model->getAfternoonTurns($id);  // verificar id medico
            } else {
                //$action = $this->model->showTurns($id); //mostrar todos los turnos (joel)
            }
        }
        $this->view->renderTurns($action);
    }
}
