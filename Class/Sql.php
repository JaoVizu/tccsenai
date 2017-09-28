<?php
//FAZER CONEXAO COM BANCO DE DADOS
const HOST = "localhost";
const USER = 'root';
const PASS = '';
const DATABASE = 'dbbijus';

$conn = mysqli_connect(HOST, USER, PASS, DATABASE) or die(mysqli_errno());

?>