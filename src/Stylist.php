<?php

    class Stylist
    {
        private $name;
        private $id;


        function __construct($name, $id = null)
        {
            $this->name= $name;
            $this->id = $id;
        }

        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function getName()
        {
            return $this->name;
        }

        function save()
        {
            $executed = $GLOBALS['DB']->exec("INSERT INTO stylists (name) VALUES ('{$this->getName()}');");
            if ($executed) {
                $this->id = $GLOBALS['DB']->lastInsertId();
                return true;
            } else {
                return false;
            }
        }

        static function getAll()
        {
           $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
           $stylists = array();
           foreach($returned_stylists as $stylist) {
               $stylist_name = $stylist['type'];
               $stylist_id = $stylist['id'];
               $new_stylist = new Stylist($stylist_name, $stylist_id );
               array_push($stylists, $new_stylist);
           }
           return $stylists;
        }

    }

?>
