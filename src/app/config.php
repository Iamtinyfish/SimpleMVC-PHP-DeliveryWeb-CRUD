<?php
//======================================database======================================//
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASSWORD = 'Hieudtptit04122k';
const DB_NAME = 'deliverydb';

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if($link === false){
    die("ERROR: CAN'T CONNECT " . mysqli_connect_error());
}
//====================================================================================//
const CONTROLLER_DEFAULT = 'Index';
const ACTION_DEFAULT = 'index';

const ADMIN_CONTROLLER_DEFAULT = 'AdminIndex';
const ADMIN_ACTION_DEFAULT = 'adminIndex';