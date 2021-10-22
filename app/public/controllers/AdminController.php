<?php

class AdminController extends Controller
{
    public static function mount()
    {

        $logout = $_POST['logout'] ?? '';

        if ($logout) {
            session_destroy();
            echo "<script> location.href='/'; </script>";
        }
    }
}
