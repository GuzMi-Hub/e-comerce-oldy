<?php

$url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
define("base_url", $url);
define("controller_default", "productoController");
define("action_default", "index");
