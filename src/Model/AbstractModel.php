<?php 

namespace App\Model;


use Config\DataBase;
use Model;

abstract class AbstractModel {

    private $pdo;

    public function __construct() {
        $this->pdo = (new DataBase)->bdd();
    }
    public function findAll(string $order="") {
        $sql = "SELECT * FROM {$this->table}";
        if ($order) {
            $sql .= " ORDER BY {$order}";
        }
        $result = $this->pdo->query($sql);
        return  $result->fetchAll();
    }

    public function find( $param) {
        if (isset($param)) {
            if (is_numeric($param)) {
                $request = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE  id =  ? LIMIT 0,1");
            } else {
                $request = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE  slug =  ? LIMIT 0,1");
            }

            $request->execute(array($param));
            
            return $request->fetch();
        } else {
            return false;
        }
    }

    public function findLastId() {
        $request = $this->pdo->query("SELECT MAX(id) as id FROM {$this->table} ");
        return $request->fetch();
    }
}