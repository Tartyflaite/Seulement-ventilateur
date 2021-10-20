<?php
function DB(){
        $configDB = parse_ini_file(realpath("../db.ini"));
        try {
            $connection = new PDO("mysql:host=".$config['host'].";dbname=".$config['db_name'], $config['username'], $config['password']);
            return $connection;
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }