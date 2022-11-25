<?php

/**
 * Class dbconf
 * Klasse med oplysninger til din database
 * - dbhost: Database host
 * - dbuser: Brugernavn til databasen
 * - dbpassword: Adgangskode til databasen
 * - dbnavn: Navnet på databasen
 * Nedarver db klassen og opretter forbindelse til database
 */
class dbconf extends db
{
    // Constructor metode
    function __construct()
    {
        $this->dbhost = "songbook.local";
        $this->dbuser = "root";
        $this->dbpassword = "";
        $this->dbname = "songbook";
        $db = parent::connect();
    }
}