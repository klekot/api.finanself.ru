<?php
/**
 * Created by PhpStorm.
 * User: Igor Klekotnev
 * Date: 14.07.17
 * Time: 22:35
 */

namespace GF\Core;

use GF\Utils\Utils as Utils;

class Application
{
    public function __construct($environment)
    {
        // Load special environments settings from environments.yml
        Utils::loadYaml(dirname(__DIR__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'environments.yml',
            $environment);

        // Load DB connection settings
        Utils::loadYaml(dirname(__DIR__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db_connections.yml',
            $environment);

        new DbConnection($environment);
    }

    public function run()
    {
        $username = $_SERVER['PHP_AUTH_USER'];
        $password = $_SERVER['PHP_AUTH_PW'];

        $user = \User::find(array('login' => $username, 'password' => $password));

        if (!is_null($user)) {
            $query = trim($_SERVER['REQUEST_URI'], '/');

            Router::dispatch($query);
        } else {
            header($_SERVER["SERVER_PROTOCOL"]." 215 Bad Authentication data");
            header('Content-Type: application/json');
            echo json_encode(array(
                'message' => 'Bad Authentication data',
                'code'    => 215
            ));
        }

    }
}