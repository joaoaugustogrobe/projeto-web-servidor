<?php

class Meal{

    private $id;
    private $type;
    private $day;
    private $dish;

    static private $idd = 1;

    public function __construct($type, $day, $dish) {
        $this->type = $type;
        $this->day = $day;
        $this->dish = $dish;
        $this->id = Meal::$idd;

        Meal::$idd = Meal::$idd + 1;
    }

    public function getId(){
        return $this->id;
    }

    public function getType():String{
        return $this->type;
    }

    public function getDay(){
        return $this->day;
    }

    public function getDish() : Dish{
        return $this->dish;
    }

}
