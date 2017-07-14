<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Stylist.php";


    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        function testGetName()
        {
            $name = "Fred Fekkai";
            $test_stylist = new Stylist($name);

            $result = $test_stylist->getName();

            $this->assertEquals($name, $result);
        }

        function testSave()
        {
            $name = "Vidal Sasson";

            $test_stylist = new Stylist($name);
            $executed = $test_stylist->save();

            $this->assertTrue($executed, "Stylist was not saved to database");

        }

        function testGetAll()
        {
            $name = "J Frieda";
            $name2 = "Fred Fekkai";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();
            $result = Stylist::getAll();
            $this->assertEquals([$test_stylist, $test_stylist2], $result);
        }

    }
?>
