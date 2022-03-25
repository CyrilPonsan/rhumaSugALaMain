<?php 

define("ASSETS", "./assets/");
define("CSS", ASSETS . "css/");
define("TEMPLATE", "./template/");
define("TEMPLATE_PAGES", TEMPLATE . 'pages/');
define("TEMPLATE_PARTS", TEMPLATE . 'template_parts/');
define("CLASSES", "./classes/");
define("ROUTES", include "routes.php");
define("DEFAULT_ROUTES", "main");
define("NO_ROUTES_DEFAULT",  "page404");