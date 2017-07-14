<?php
    class Client
    {
        private $client_name;
        private $stylist_id;
        private $appointment;
        private $id;

        function __construct($client_name, $stylist_id, $appointment, $id = null)
        {
            $this->client_name = $client_name;
            $this->stylist_id = $stylist_id;
            $this->appointment = $appointment;
            $this->id = $id;
        }

        function setClientName($new_client_name)
        {
            $this->client_name = (string) $new_client_name;
        }

        function getClientName()
        {
            return $this->client_name;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }

        function getAppointment()
        {
          return $this->appointment;
        }

        function getId()
        {
            return $this->id;
        }
        function save()
        {
            $executed = $GLOBALS['DB']->exec("INSERT INTO clients (client_name, stylist_id, appointment) VALUES ('{$this->getClientName()}', {$this->getStylistId()}, '{$this->getAppointment()}');");
           if ($executed) {
               $this->id = $GLOBALS['DB']->lastInsertId();
               return true;
           } else {
               return false;
           }
        }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = array();
            foreach($returned_clients as $client) {
                $client_name = $client['client_name'];
                $stylist_id = $client['stylist_id'];
                $appointment = $client['appointment'];
                $id = $client['id'];
                $new_client = new Client($client_name, $stylist_id, $appointment, $id);
                array_push($clients, $new_client);
            }
            return $clients;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }

        static function find($search_id)
        {
            $returned_clients = $GLOBALS['DB']->prepare("SELECT * FROM clients WHERE id = :id");
            $returned_clients->bindParam(':id', $search_id, PDO::PARAM_STR);
            $returned_clients->execute();
            foreach($returned_clients as $client) {
               $client_name = $client['client_name'];
               $stylist_id = $client['stylist_id'];
               $appointment = $client['appointment'];
               $client_id = $client['id'];
               if ($client_id == $search_id) {
                   $new_client = new Client($client_name, $stylist_id, $appointment, $client_id);
               }
           }
           return $new_client;
        }
    }

?>
