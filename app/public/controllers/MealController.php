<?php

class MealController extends Controller
{
    static function validateId($id)
    {
        if(isset($id)) return false;

        $_SESSION["update-meal-error"] = 'dishId is required';
        return true; //isValid
    }

    static function validateType($type)
    {
        if(isset($type) && ($type == 'lunch' || $type == 'dinner')) return false;
        $_SESSION["update-meal-error"] = 'type is invalid';
        return true;
    }

    static function validateDay($day)
    {
        if (is_numeric($day) && (int)$day == $day) return false;
        $_SESSION["update-meal-error"] = 'day is invalid';
        return true;
    }

    static function validateDish($dishId)
    {
        if((null !== $dishId && null !== DishRepository::getDishById($dishId)) && is_a(DishRepository::getDishById($dishId), 'Dish')) return false;
        $_SESSION["update-meal-error"] = 'dish is invalid';
        return true;
    }

    public static function mount()
    {
        unset($_SESSION["update-meal-error"]);
        unset($_SESSION["update-meal-success"]);

        if (!empty($_POST)) {

            $action = $_POST['action'] ?? 'create';

            if ($action == 'delete') {
                $mealId = $_POST['id'] ?? '';

                $error = self::validateId($mealId);

                if ($error) $_SESSION["update-meal-error"] = $error;
                else $_SESSION["update-meal-success"] = 'Deleted dish of id ' . $mealId;
            } else if ($action == 'edit') {

                $mealId = $_POST['id'] ?? '';
                $type = $_POST['type'] ?? '';
                $day = $_POST['day'] ?? '';
                $dishId = $_POST['dish'] ?? '';

                $error = self::validateId($mealId) || self::validateType($type) || self::validateDay($day) || self::validateDish($dishId);

                if(!$error) {
                    $_SESSION["update-meal-success"] = 'Saved!';
                    $_SESSION["meal-edit-context"] = MealRepository::getMealById($mealId);
                }
            } else if ($action == 'create') {

                $type = $_POST['type'] ?? '';
                $day = $_POST['day'] ?? '';
                $dishId = $_POST['dish'] ?? '';

                $error = self::validateType($type) || self::validateDay($day) || self::validateDish($dishId);

                if (!$error) $_SESSION["update-meal-success"] = 'Created!';
            }

        } else {

            $mealId = $_GET['id'] ?? '';

            if (!empty($_GET['id'])) {
                $_SESSION["meal-edit-context"] = MealRepository::getMealById($mealId);
            } else {
                unset($_SESSION["meal-edit-context"]);
            }
        }
    }
}
