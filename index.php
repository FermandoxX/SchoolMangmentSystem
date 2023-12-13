<?php

const BASE_PATH = __DIR__. '../';

require '../SchoolMangmentSystem/Model/HelperFunction.php';

require BASE_PATH.'Model/Padination.php';

require '../SchoolMangmentSystem/Router/Router.php';

$connection = require BASE_PATH.'Model/DatabaseConnection.php';

require BASE_PATH.'Model/Database.php';

require '../SchoolMangmentSystem/Model/Notificate.php';

require BASE_PATH.'Model/HelperClasses.php';


$db = new Database($connection);

$router = new router();

$routs = require BASE_PATH . 'routers.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = ($_SERVER['REQUEST_METHOD']);



$router->route($uri,$method);






?>









