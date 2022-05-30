<?php


require_once "./Metodologia-2022-vueTurns_TPE2-39/Views/TurnsView.php";
require_once "./Metodologia-2022-vueTurns_TPE2-39/Models/TurnsModel.php";


    class LoginController{

        private $model;
        private $view;
        private $authHelper;
       
    function __construct(){
        $this->model = new TurnsModel();
        $this->view = new TurnsView();
        $this->authHelper = new AuthHelper();
    }  

}