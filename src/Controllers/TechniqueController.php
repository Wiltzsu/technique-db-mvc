<?php

namespace App\Controllers;

use App\Models\Technique;
use App\Models\Category;
use App\Models\Position;
use Twig\Environment;

class TechniqueController
{
    private $techniqueModel;
    private $categoryModel;
    private $positionModel;
    private $twig;

    public function __construct(Technique $techniqueModel, Category $categoryModel, Position $positionModel, Environment $twig)
    {
        $this->techniqueModel = $techniqueModel;
        $this->categoryModel = $categoryModel;
        $this->positionModel = $positionModel;
        $this->twig = $twig;
    }

    public function getTechniques($userID)
    {
        return $this->techniqueModel->getTechniques($userID);
    }

    public function addTechniqueForm()
    {
        $userID = $_SESSION['userID'] ?? null;
        if (!$userID) {
            header('Location: login');
            exit();
        }

        $categories = $this->categoryModel->getCategories();
        $positions = $this->positionModel->getPositions();

        $roleID = $_SESSION['roleID'] ?? null;
        $username = $_SESSION['username'] ?? null;

        echo $this->twig->render('addnew/add_technique.twig', [
            'userID' => $userID,
            'roleID' => $roleID,
            'username' => $username,
            'categories' => $categories,
            'positions' => $positions
        ]);
    }

    public function postTechnique($formData)
    {
        $userID = $_SESSION['userID'] ?? null;
        if (!$userID) {
            header('Location: login');
            exit();
        }

        $techniqueName = $formData['techniqueName'] ?? null;
        $techniqueDescription = $formData['techniqueDescription'] ?? null;
        $categoryID = $formData['categoryID'] ?? null;
        $positionID = $formData['positionID'] ?? null;

        $errors = $this->techniqueModel->createNewTechnique(
            $userID,
            $techniqueName,
            $techniqueDescription,
            $categoryID,
            $positionID
        );
        
        if (!empty($errors)) {
            echo $this->twig->render('addnew/add_technique.twig', ['errors' => $errors, 'input' => $formData]);
        } else {
            header('Location: addnew');
            exit();
        }
    }
}
?>