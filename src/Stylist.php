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

        function getId()
        {
            return $this->id;
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
               $stylist_name = $stylist['name'];
               $stylist_id = $stylist['id'];
               $new_stylist = new Stylist($stylist_name, $stylist_id );
               array_push($stylists, $new_stylist);
           }
           return $stylists;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists;");
        }

        function testFind()
        {
            $type = "thai food";
            $type2 = "mexican food";
            $test_cuisine = new Cuisine($type);
            $test_cuisine->save();
            $test_cuisine2 = new Cuisine($type2);
            $test_cuisine2->save();
            $id = $test_cuisine->getId();
            $result = Cuisine::find($id);
            $this->assertEquals($test_cuisine, $result);
        }

        function getClients()
        {
            
        }

    }

?>
