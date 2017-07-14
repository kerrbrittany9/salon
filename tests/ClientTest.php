<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Client.php";
    require_once "src/Stylist.php";


    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Client::deleteAll();
            Stylist::deleteAll();
        }

        function testSave()
        {
            $name = "Mickey Mouse";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $client_name = "Olive";
            $appointment = "July 25";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client_name, $stylist_id, $appointment);
            $executed = $test_client->save();
            $this->assertTrue($executed, "Client was not saved to database");
        }

        function testGetAll()
        {
            $name = "Dolly";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();

            $client_name = "Billy Bob";
            $appointment = "September 3";
            $client_name2 = "Patsy";
            $appointment2 = "Oct 14";
            $test_client = new Client($client_name, $stylist_id, $appointment);
            $test_client->save();
            $test_client2 = new Client($client_name2, $stylist_id, $appointment2);
            $test_client2->save();

            $result = Client::getAll();

            $this->assertEquals([$test_client, $test_client2], $result);
        }

        function testDeleteAll()
        {
            $name = "Paul Mitchell";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();

            $client_name = "Tammy";
            $appointment = "Aug 17, 10am";
            $client_name2 = "Alexa";
            $appointment2 = "Aug 15, 6pm";
            $test_client = new Client($client_name, $stylist_id, $appointment);
            $test_client->save();
            $test_client2 = new Client($client_name2, $stylist_id, $appointment2);
            $test_client2->save();

            Client::deleteAll();
            $result = Client::getAll();

            $this->assertEquals([], $result);
        }

        function testGetId()
        {
            $name = "Don Trump Jr";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $client_name = "Kelly";
            $appointment = "Oct 1, 11am";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client_name, $stylist_id, $appointment);
            $test_client->save();
            $result = $test_client->getId();
            $this->assertTrue(is_numeric($result));
        }

    }
?>
