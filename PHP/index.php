<?php
//config.php cmmt
require_once 'config.php';

//_helper.php
require_once 'views/_helpers.php';

//models/Menu.php
require_once 'models/menu.php';

//controller/menux.php
require_once 'controllers/menu.php';
//order.php
require_once 'models/order.php';

// echo "hello world";
switch ($_SERVER['PATH_INFO'] ?? $_SERVER['REQUEST_URI']) {
    case '/':
        // global $pdo;
        // $stmt = $pdo->query("SELECT name FROM menus WHERE id = 1;");
        // $test_name = $stmt->fetch(PDO::FETCH_ASSOC);
        // include 'views/home.php';
        render('home',[]);
        break;

    //URL menu_list
    case '/menu_list':
        $menus = Menu::getAll();
        // include 'views/menu_list.php';
        render('menu_list',['menus'=> $menus]);
        break;

    case '/home':
        // include 'views/home.php';
        render('home',[]);
        break;

    //order list
    case '/order_list':
        $cond_date = null;
        if (!empty($_GET) && !empty($_GET['cond_date'])) {
            $cond_date = $_GET['cond_date'];
        }
         $orders = Order::getAll($_GET);
        // include 'views/order_list.php';
        render('order_list',['cond_date'=>$cond_date,'orders'=>$orders]);
        break;

    //New_menu

    case '/new_menu':
        // include 'views/form_menu.php';
        render('form_menu',[]);
        break;
        
    //edit_menu
    case '/edit_menu':
        $old = menu::getMenu($_GET['id']);
        // include 'views/form_menu.php';
        render('form_menu',['old'=>$old]);
        break;

    //Order Detail
    case '/order_detail':
        $order = Order::getOrder($_GET['id']);
        // include 'views/order_detail.php';
        render('order_detail',['order'=>$order]);
        break;
        //update_menu

    case '/update_menu':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo $_POST['menu_name'];
            //create instance object
            $controller = new MenuController();
            //call createMenu $post=paremeter
            $controller->updateMenu($_POST);
        } else {
            echo "Bad Request";
        }
        break;

    //create_menu
    case '/create_menu':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo $_POST['menu_name'];

            //create instance object
            $controller = new MenuController();

            //call createMenu $post=paremeter
            $controller->createMenu($_POST);
        } else {
            echo "Bad Request";
        }
        break;

    default:
        echo "Page not found";
        break;
}
