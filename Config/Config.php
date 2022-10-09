<?php

//define("BASE_URL", "http://localhost/paraiso_azul/");
const BASE_URL = "http://localhost/paraiso_azul";

//Zona horaria
date_default_timezone_set('America/Costa_Rica');

//Datos de conexión a Base de Datos
const DB_HOST = "localhost";
const DB_NAME = "db_paraiso_azul";
const DB_USER = "root";
const DB_PASSWORD = "";
const DB_CHARSET = "utf8";

//Deliminadores decimal y millar Ej. 24,1989.00
const SPD = ".";
const SPM = ",";

//Simbolo de moneda
const SMONEY = "₡";

//Datos envio de correo
const NOMBRE_REMITENTE = "Paraiso Azul";
const EMAIL_REMITENTE = "andmejigo12@gmail.com";
const NOMBRE_EMPESA = "Paraiso Azul";
const WEB_EMPRESA = "www.cemede.una.ac.cr";
