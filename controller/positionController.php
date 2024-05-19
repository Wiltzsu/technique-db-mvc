<?php
// /controller/categoryController.php
ini_set('log_errors', 1);
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'model/positionModel.php';

class PositionController {
    private $position;

    public function __construct($db) {
        $this->position = new Position($db);
    }

    public function index() {
        $positions =  $this->position->getAllPositions();

        // Pass positions to the view
        require 'view/AddTechniqueView.php';

    }
}