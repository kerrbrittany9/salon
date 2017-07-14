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

    }
?>
