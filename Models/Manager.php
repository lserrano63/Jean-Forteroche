<?php

class Manager {

    public function dbConnection()
    {
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=jeanforteroche;charset=utf8', 'root', '');
            return $db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}