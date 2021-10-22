<?php

session_start();



// spl_autoload_register(function ($class) {
//     include 'classes/' . $class . '.php';
// });

spl_autoload_register(function ($class) {
    if(file_exists('Models/' . $class . '.php'))
        require_once('Models/' . $class . '.php');
    
    if(file_exists('classes/' . $class . '.php'))
        require_once('classes/' . $class . '.php');
    else if(file_exists('controllers/' . $class . '.php'))
        require_once('controllers/' . $class . '.php');
    });



require_once('./Routes.php');


// session_start();

// //Checar se o usuário já está logado
// if (!empty($_SESSION['logged-in']) && $_SESSION['logged-in']) {
//     require('./controllers/AdminPanelController.php');
// } else{
//     require('./controllers/DashboardController.php');
// }

// // checar se as credenciais do usuario estão ok
// if ($usuario == 'admin' && $senha == '123456') {
//     $_SESSION['logado'] = true;
//     $_SESSION['usuario'] = 'Administrador';
//     $_SESSION['cartao'] = '411111111111111';

//     header('Location: pagina_segura.php');
// } else if (!empty($_POST)) {
//     $erro = true;
// }
?>