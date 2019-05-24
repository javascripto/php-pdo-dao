<?php

namespace App\Model;

class Conexao
{
    private static $instance;

    private static $host = '127.0.0.1';
    private static $user = 'root';
    private static $pass = 'root';
    private static $base = 'pdo';

    private function __construct()
    { }

    private function __clone()
    { }

    private function __wakeup()
    { }

    public static function getConexao(): \PDO
    {
        if (!isset(self::$instance)) {
            $host = self::$host;
            $base = self::$base;

            self::$instance = new \PDO(
                "mysql:host={$host};dbname={$base};charset=utf8",
                self::$user,
                self::$pass
            );
        }
        return self::$instance;
    }
}
