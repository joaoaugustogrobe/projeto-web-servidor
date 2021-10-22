<?php

$d = [
    new Dish('Yakisoba', 'A quick and spicy meal. I really don\'t like a lot of the flavors from the Maruchan Yakisoba', 'https://miro.medium.com/max/1000/0*ZrkC2g7ETZnbUm8h'),
    new Dish('Almondegas', 'Almondegas e macarronada ao molho bolonhesa.', 'https://images.unsplash.com/photo-1515516969-d4008cc6241a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8ZGlubmVyfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60'),
    new Dish('Camarão e arroz', 'A quick and spicy meal. I really don\'t like a lot of the flavors from the Maruchan Yakisoba', 'https://miro.medium.com/max/1000/0*ZrkC2g7ETZnbUm8h'),
    new Dish('Bife ao molho Madeira', 'A quick and spicy meal. I really don\'t like a lot of the flavors from the Maruchan Yakisoba', 'https://miro.medium.com/max/1000/0*ZrkC2g7ETZnbUm8h'),
];


class DishRepository
{
    static $dishes;

    static function getDishes(): iterable
    {
        return self::$dishes;
    }

    static function getDishById($id): Dish {
        return self::$dishes[$id - 1];
    }
}

DishRepository::$dishes = $d;
