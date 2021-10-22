<?php

class LoginController extends Controller{
    public static function mount(){

        $logout = $_POST['logout'] ?? '';

        if ($logout) {
            session_destroy();
            echo "<script> location.href='/'; </script>";
            return;
        }

        $user = $_POST['user'] ?? '';
        $password = $_POST['password'] ?? '';

        //Checar se o usuário já está logado
        if (!empty($_SESSION['logged-in']) && $_SESSION['logged-in']) {
            echo "<script> location.href='dish'; </script>";
            return;
        }

        // checar se as credenciais do usuario estão ok
        if ($user == 'admin' && $password == '123456') {
            echo "LOGADO!!!";
            $_SESSION['logged-in'] = true;
            $_SESSION['user'] = 'Administrador';

            unset ($_SESSION["login-error"]);
            unset ($_SESSION["login-error-autofill-user"]);
            unset ($_SESSION["login-error-autofill-password"]);

            echo "<script> location.href='dish'; </script>";
        } else if (!empty($_POST)) {
            $_SESSION["login-error"] = true;
            $_SESSION["login-error-autofill-user"] = $user;
            $_SESSION["login-error-autofill-password"] = $password;
        }else{
            unset ($_SESSION["login-error"]);
            unset ($_SESSION["login-error-autofill-user"]);
            unset ($_SESSION["login-error-autofill-password"]);
        }
    }
}

?>