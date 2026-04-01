<?php
class Menu{
    public static function  getAll(){
        global $pdo;
        $stmt = $pdo->query("SELECT*FROM menus");
        return $stmt-> fetchAll(PDO::FETCH_ASSOC);
    }
    public static function create($name,$category,$price){
        $sql = "INSERT INTO menus(name,category,price) VALUES(?,?,?) ";
        global $pdo;
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(array($name,$category,$price));
    }

    public static function update($name,$category,$price ,$id){
        $sql = " UPDATE menus
         SET name =? , category=? , price=? 
         WHERE id =?";
        global $pdo;
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(array($name,$category,$price,$id));
    }



    public static function getMenu($id){
        $sql_statement = <<<SQL
        SELECT
        id,
        name AS menu_name,
        category,
        price
        FROM menus
        WHERE id = ?
        SQL;
        global $pdo;
        $stmt = $pdo->prepare($sql_statement);
        $stmt->execute(array($id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?> 