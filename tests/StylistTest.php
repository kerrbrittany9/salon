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
            Client::deleteAll();
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

        function testFind()
        {
            $name = "Oribe";
            $name2 = "J Redding";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();
            $id = $test_stylist->getId();
            $result =Stylist::find($id);
            $this->assertEquals($test_stylist, $result);
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


        function testUpdate()
        {
            $name = "katie";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $new_name = "kadie";
            $test_stylist->update($new_name);

            $this->assertEquals("kadie", $test_stylist->getName());
        }

        function testDelete()
        {
            $name = "Joe";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $name_2 = "Hawaii Joe";
            $test_stylist2 = new Stylist($name_2);
            $test_stylist2->save();

            $test_stylist->delete();

            $this->assertEquals([$test_stylist2], Stylist::getAll());
        }

        function testDeleteCategoryTasks()
        {
            $name = "Jimmy";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $client_name = "Kay";
            $appointment = "Aug 1";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client_name, $appointment, $stylist_id);
            $test_client->save();

            $test_stylist->delete();

            $this->assertEquals([], Client::getAll());
        }
    }
?>
