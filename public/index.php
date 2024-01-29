<?php

// The require_once() will first check whether a file is already included or not
// and if it is already included then it will not include it again.
// require_once function is used just once
//  Use require() to load template-like files.
// 	Use require_once() to load dependencies ( classes, functions, constants).
// the include() function generates a warning, but the script will continue execution. The require() generates a fatal error, and the script will stop.
require_once '../app/class_loader.php';
$init = new Core();
