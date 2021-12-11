<?php


class ControllerBase
{
    public function authentication() : void
    {
        if (isset($_SESSION['username']))
            header('Location: http://' . $_SERVER['HTTP_HOST']);//redirect đến trang chủ
    }
}