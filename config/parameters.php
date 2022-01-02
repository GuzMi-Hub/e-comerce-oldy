<?php

<<<<<<< HEAD
define("base_url", "http://localhost/e-comerce-oldy/");
=======
$url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
define("base_url", $url);
>>>>>>> 18f78d04d444f16a71446e02ee77ad1bb35cb942
define("controller_default", "productoController");
define("action_default", "index");
