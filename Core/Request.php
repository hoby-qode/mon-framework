<?php

use Core\Utils;


class Request
{
    private ?array $request;
    public function __construct()
    {
        $this->request = $this->request();
        $this->pdo     = Utils::bdd();
    }

    public function request() {
        $request = null;
        if (isset($_REQUEST)) {
            $request = $_REQUEST;
        }
        return $request;
    }

    public function securiseData( $data ) {
        if ($data) {
            $donneeSecuriser = [];
            foreach ($data as $key => $value ) {
                $donneeSecuriser [$key] = htmlentities($value);
            }
            return $donneeSecuriser;
        }else {
            return false;
        }
    }
    /**
     * Ajout des données dans BD
     *
     * @return bool
     * @param $donneeSecuriser donnée déjà traiter dans le fonction securiseData()
     */
    public function insertTo( $table, $donneeSecuriser ):bool {
        $identifiant = [];
        $values = [];
        $dataToExecute = [];
        foreach ($donneeSecuriser as $k => $v) {
            $identifiant[] = $k;
            $values[] = ":$k";
            $dataToExecute[":$k"] = $v;
        }
        $request = $this->pdo->prepare("INSERT INTO {$table} (" . implode(' , ', $identifiant ) . ") VALUES ( " . implode(' , ', $values ) .")");
        $request->execute($dataToExecute);
        dump( $dataToExecute);

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
     * @param $donneeSecuriser donnée déjà traiter dans le fonction securiseData()
     */
    public function updateTo( $table, $id, $donneeSecuriser ):bool {
        $dataToExecute = [];
        foreach ($donneeSecuriser as $k => $v) {
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
     * @param $donneeSecuriser | donnée déjà traiter dans le fonction securiseData()
     */
    public function delete( $table, $id, $donneeSecuriser ):bool {
        $dataToExecute = [];
        foreach ($donneeSecuriser as $k => $v) {
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