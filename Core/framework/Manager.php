<?php


namespace Core\Framework;

use Config\DataBase;
use Symfony\Component\HttpFoundation\Request;

class Manager
{
    /**
     *
     * @param DataBase $db
     */

    public function __construct()
    {
        $this->pdo  = (new DataBase)->bdd() ;
    }
    /**
     * Ajout des données dans BD
     *
     * @param $table
     * @param $donneeSecuriser | donnée déjà traiter dans le fonction securiseData()
     * @return bool
     */
    public function insertTo( $table, $data ):bool {
        $identifiant = [];
        $values = [];
        $dataToExecute = [];
        foreach ($data as $k => $v) {
            $identifiant[] = $k;
            $values[] = ":$k";
            $dataToExecute[":$k"] = $v;
        }
        $request = $this->pdo->prepare("INSERT INTO {$table} (" . implode(' , ', $identifiant ) . ") VALUES ( " . implode(' , ', $values ) .")");
        $request->execute($dataToExecute);

        if ($request->rowCount() > 0) {
            return true;
        }else {
            return false;
        }
    }
    /**
     * Mise à jour des données dans BD
     *
     * @return bool
     */
    public function updateTo( $table, $id, $data ):bool {
        $dataToExecute = [];
        foreach ($data as $k => $v) {
            $set[] = "$k = :$k";
            $dataToExecute[":$k"] = $v;
        }
        $request = $this->pdo->prepare(" UPDATE {$table} SET " . implode(' , ', $set ) . " WHERE id = $id");
        $request->execute($dataToExecute);

        if ($request->rowCount() > 0) {
            return true;
        }else {
            return false;
        }
    }
    /**
     * Suppréssion 
     *
     * @return bool
     */
    public function delete( $table, $id, $data ):bool {
        $dataToExecute = [];
        foreach ($data as $k => $v) {
            $set[] = "$k = :$k";
            $dataToExecute[":$k"] = $v;
        }
        $request = $this->pdo->prepare(" DELETE {$table} SET " . implode(' , ', $set ) . " WHERE id = $id");
        $request->execute($dataToExecute);

        if ($request->rowCount() > 0) {
            return true;
        }else {
            return false;
        }
    }
}