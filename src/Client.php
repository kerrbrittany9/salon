<?php
    class Client
    {
        private $name;
        private $stylist_id;
        private $appointment;
        private $id;

        function __construct($name, $stylist_id, $appointment, $id = null)
        {
            $this->name = $name;
            $this->stylist_id = $stylist_id;
            $this->appointment = $appointment;
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


    }


?>
