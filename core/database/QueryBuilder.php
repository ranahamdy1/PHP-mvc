<?php

namespace core\database;

class QueryBuilder {
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    ///1- insert
    public function insert($table, $params) {
        $sql = sprintf(
            "insert into %s (%s) values (%s)",
            $table,
            implode(',',array_keys($params)),
            ':'.implode(',:',array_keys($params))
        );
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($params);
        }catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
    ///2- read
//    public function selectAll($table) {
//        $sql = sprintf("select * from %s", $table);
//        try {
//            $statement = $this->pdo->prepare($sql);
//            $statement->execute();
//            return $statement->fetchAll(\PDO::FETCH_ASSOC);
//        }catch (\PDOException $e) {
//            die($e->getMessage());
//        }
//    }

//    public function select($table, $id) {
//        $sql = sprintf("select * from %s where id = :id", $table, $id);
//        try {
//            $statement = $this->pdo->prepare($sql);
//            $statement->execute(['id' => $id ]);
//            return $statement->fetch(\PDO::FETCH_OBJ);
//        }catch (\PDOException $e) {
//            die($e->getMessage());
//        }
//    }

    public function select($table, $where, $params) {
        $sql = sprintf("select * from %s where %s", $table, $where);
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($params);
            return $statement->fetch(\PDO::FETCH_OBJ);
        }catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
    ///3- update
    public function update($table, $set, $where, $params) {
        $sql = sprintf("update %s set %s where %s", $table, $set, $where);
        var_dump($sql);
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($params);
        }catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
    ///4- delete

//    public function delete($table, $id) {
//        $sql = sprintf("delete from %s where id = :id", $table, $id);
//        var_dump($sql);
//        try {
//            $statement = $this->pdo->prepare($sql);
//            $statement->execute(['id'=>$id]);
//        }catch (\PDOException $e) {
//            die($e->getMessage());
//        }
//    }
    public function delete($table, $where, $params) {
        $sql = sprintf("delete from %s where %s", $table, $where);
        var_dump($sql);
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($params);
        }catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

}