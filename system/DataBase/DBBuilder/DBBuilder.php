<?php

namespace System\DataBase\DBBuilder;


use System\DataBase\DBConnection\DBConnection;

class DBBuilder{

    public function __construct(){

        $this->createTables();
        die("migrations run successfully");
    }

    private function getMigrations(){

        $oldMigrationsArray = $this->getOldMigrations();
        $base_dir = getConfig()->toArray()['APP']['BASE_DIR'];
        $migrationsDirectory = $base_dir . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'migrations'
            .DIRECTORY_SEPARATOR;

        $allMigrationsArray = glob($migrationsDirectory . "*.php");
        $newMigrationsArray = array_diff($allMigrationsArray, $oldMigrationsArray);
        $this->putOldMigrations($allMigrationsArray);

        $sqlCodeArray = [];
        foreach ($newMigrationsArray as $fileName){
            $sqlCode = require $fileName;
            array_push($sqlCodeArray, $sqlCode[0]);
        }

        return $sqlCodeArray;
    }

    private function getOldMigrations(){

        $data = file_get_contents(__DIR__ . '/oldTable.db');
        return empty($data) ? [] : unserialize($data);
    }

    private function putOldMigrations($value){

        file_put_contents(__DIR__ . '/oldTable.db', serialize($value));
    }

    private function createTables(){

        $migrations = $this->getMigrations();
        $pdoInstance = DBConnection::getDBConnectionInstance();
        foreach ($migrations as $migration){
            $stmt = $pdoInstance->prepare($migration);
            $stmt->execute();
        }
        return true;
    }

}