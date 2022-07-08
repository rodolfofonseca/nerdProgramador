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
    function download($arquivo){
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream;");
        header("Content-Length:".filesize($arquivo));
        header("Content-disposition: attachment; filename=".$arquivo);
        header("Pragma: no-cache");
        header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
        header("Expires: 0");
        readfile($arquivo);
        flush();
    }
}
?>