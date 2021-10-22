<?php
    function DB(){
        $config = require_once('config.php');
        try {
            $connection = new PDO("mysql:host=".$config['host'].";dbname=".$config['db_name'], $config['username'], $config['password']);
            return $connection;
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }