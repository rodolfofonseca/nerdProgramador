<?php
require_once 'Database.php';
class Controller{
    
    public function insert($table, $data){
        return (bool) Database::use((string) $table)->insert((array) $data);
    }

    public function update($table, $data, $condition){
        return (bool) Database::use((string) $table)->update((array) $condition, (array) $data);
    }

    public function find_all($table, $condition = [], $order = []){
        return (array) Database::use( $table)->all( $condition, $order);
    }

    public function find($table, $condition, $order){
        return (array) Database::use((string) $table)->one((array) $condition, (array) $order);
    }
    public function next($table, $field, $condition = []){
        $next = (int) 1;
        $last = (array) Database::use((string) $table)->one((array) $condition, [$field => false]);
        if(empty($last) == false)
            $next = (int) $last[$field]+1;
        return $next;
    }
}
?>