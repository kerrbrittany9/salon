<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Stylist.php";
    require_once "src/Client.php";


    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Stylist::deleteAll();
        }

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
            $name2 = "Joe";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();


            $result = Stylist::getAll();

            $this->assertEquals([$test_stylist, $test_stylist2], $result);
        }

        function testDeleteAll()
        {
            $name = "Oribe";
            $name2 = "J Redding";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();

            Stylist::deleteAll();

            $result = Stylist::getAll();

            $this->assertEquals([], $result);
       }

        function testGetClients()
        {
            $name = "Suzy Q";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();

            $client_name = "Little Brother";
            $appointment = "Dec 18";
            $client_name2 = "Big Brother";
            $appointment2 = "Dec 8";
            $test_client = new Client($client_name, $stylist_id, $appointment);
            $test_client->save();
            $test_client2 = new Client($client_name2, $stylist_id, $appointment2);
            $test_client2->save();
            $result = $test_stylist->getClients();
            $this->assertEquals([$test_client, $test_client2], $result);
        }
    }
?>
