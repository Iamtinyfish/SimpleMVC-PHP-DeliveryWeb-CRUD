<?php


class ControllerBase
{
    public function authentication(): bool
    {
        if (isset($_SESSION['username'])) return true;
        return false;
    }
}