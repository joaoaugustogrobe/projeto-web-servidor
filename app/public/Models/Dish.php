<?php

class Dish{

    private $id;
    private $name;
    private $description;
    private $url;

    static private $idd = 1;

    public function __construct($name, $description, $url) {
        $this->name = $name;
        $this->description = $description;
        $this->url = $url;
        $this->id = Dish::$idd;

        Dish::$idd = Dish::$idd + 1;
        // self::$name = $name;
        // self::$description = $description;
        // self::$url = $url;
        // self::$id = self::$idd;

        // self::$idd = self::$idd + 1;
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getUrl(){
        return $this->url;
    }

    // static function getDishes(){
    //     DATABASE QUERY
    // }

    // static function getDishById($id){
    //     DATABASE QUERY
    // }
}


?>