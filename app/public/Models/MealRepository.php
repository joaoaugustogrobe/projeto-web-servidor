<?php

$m = [
    new Meal(
        'lunch',
        mktime(0, 0, 0, 10, 22, 2021),
        DishRepository::getDishById(1),
    ),
    new Meal(
        'dinner',
        mktime(0, 0, 0, 10, 22, 2021),
        DishRepository::getDishById(2),
    ),
    new Meal(
        'lunch',
        mktime(0, 0, 0, 11, 22, 2021),
        DishRepository::getDishById(3),
    ),
    new Meal(
        'dinner',
        mktime(0, 0, 0, 11, 22, 2021),
        DishRepository::getDishById(4),
    )
];


class MealRepository
{
    static $meals;

    static function getMeals(): iterable
    {
        return self::$meals;
    }

    static function getMealById($id): Meal
    {
        return self::$meals[$id - 1];
    }
}

MealRepository::$meals = $m;
