<?php
//use app\base\Application;

require_once "../base/Application.php";
//require_once "../services/ClassAutoLoad.php";

//ClassAutoLoad::autoLoad('app\base\Application');
echo "RewriteRule!";
die();
app\base\Application::call()->run();

?>