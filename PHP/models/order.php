<?php
 class Order{
    public static function getAll($conds){
        global $pdo;
        if(!empty($conds)&& !empty($conds['cond_date'])){
            $stmt = $pdo->prepare("SELECT orders.id,  orders.order_at 
        as order_datetime, customers.name 
        as customer_name
        FROM orders 
        INNER JOIN customers ON orders.customer_id = customers.id
          where order_at>=? and order_at <? ");
          $cond_datetime = new DateTime($conds['cond_date'] . "00.00:00");
          $stmt->execute(array($cond_datetime->format("Y-m-d H:i:s"),
           $cond_datetime->modify('+1 day')->format("Y-m-d H:i:s")));

        }else{
            $stmt = $pdo->query("SELECT orders.id,  orders.order_at 
        as order_datetime, customers.name 
        as customer_name
        FROM orders 
        INNER JOIN customers ON orders.customer_id = customers.id ");
        }
        
        return $stmt-> fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getOrder($id){
        global $pdo;
         $stmt = $pdo->prepare("SELECT orders.id,  orders.order_at 
         as order_datetime,customers.name as customer_name, menus.name 
         as menu_name,orders.quantity,menus.price
        FROM orders 
        INNER JOIN customers ON orders.customer_id = customers.id
        INNER JOIN menus ON menus.id=orders.menus_id WHERE orders.id= ? ");
        $stmt->execute(array($id));
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
 }
?>