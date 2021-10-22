<?php

class DishController extends Controller
{
    public static function mount()
    {
        unset($_SESSION["update-dish-error"]);
        unset($_SESSION["update-dish-success"]);

        if (!empty($_POST)) {

            $action = $_POST['type'] ?? 'create';

            if ($action == 'delete') {
                $dishId = $_POST['id'] ?? '';
                if (!$dishId) {
                    $_SESSION["update-dish-error"] = 'dishId is required';
                    return;
                }
                //delete from database
                $_SESSION["update-dish-success"] = 'Deleted dish of id '.$dishId;
                return;
            }


            $dishName = $_POST['name'] ?? '';
            $dishDescription = $_POST['description'] ?? '';
            $dishURL = $_POST['url'] ?? '';

            $hasError = false;

            if (strlen($dishName) <= 5) {
                $_SESSION["update-dish-error"] = 'dishName should be at least 6 characters long';
                $hasError = true;
            } else if (strlen($dishDescription) <= 5) {
                $_SESSION["update-dish-error"] = 'dishDescription should be at least 6 characters long';
                $hasError = true;
            } else if (!$dishURL) {
                $_SESSION["update-dish-error"] = 'dishURL is required';
                $hasError = true;
            }

            if ($action == 'edit') {
                $dishId = $_POST['id'] ?? '';

                if (!$dishId) {
                    $_SESSION["update-dish-error"] = 'dishId is required';
                    $hasError = true;
                }

                //save in database
                if (!$hasError) {
                    $_SESSION["update-dish-success"] = 'Saved!';
                    $_SESSION["dish-edit-context"] = DishRepository::getDishById($dishId);
                }
            } else if ($action == 'create') {
                //add in database
                if (!$hasError) {
                    $_SESSION["update-dish-success"] = 'Created!';
                }
            }
        } else {

            $dishId = $_GET['id'] ?? '';

            //Checar se o usuário já está logado
            if (!empty($_GET['id'])) {
                $_SESSION["dish-edit-context"] = DishRepository::getDishById($dishId);
            } else {
                unset($_SESSION["dish-edit-context"]);
            }
        }
    }
}
