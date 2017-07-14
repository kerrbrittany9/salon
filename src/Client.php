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
            
        }

    }


?>
