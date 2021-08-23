<?php
function is_localhost() {
	$whitelist = array( '127.0.0.1', '::1' );
	if ( in_array( $_SERVER['REMOTE_ADDR'], $whitelist ) ) {
		return true;
	}
}
function setPage($file, $title){
	global $contentFile;
	global $viewContent;
	global $pageTitle;
	global $loggedIn;
	global $baseDir;
	$viewContent = '';
	$pageTitle = $title;
	$contentFile = $file;
	$modelFile = 'app/model/'.$contentFile.'.class.php';
	$controlFile = 'app/controller/'.$contentFile.'_controller.php';
	$viewFile = "app/view/".$contentFile.".php";
	ob_start();
	if(file_exists($modelFile)){ require_once $modelFile; }
	if(file_exists($controlFile)){ require_once $controlFile; }
	if(file_exists($viewFile)){ require_once $viewFile; }
	else{ return NULL; }
	$viewContent = ob_get_clean();
	return $viewContent;
}

global $routed;
global $contentFile;
global $viewContent;
global $pageTitle;
global $loggedIn;
global $baseDir;
require_once 'route.php';
$route = new Route();
$dirParts = explode('\\', __DIR__);
$baseDir = '/'.end($dirParts).'/';
$siteTagline = 'PHP MVC Framework';

$loggedIn = false;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['useruid'])){
	$loggedIn = true;
}

// Add valid routes for pages
$route->add('/', function() {
	setPage('home', 'Home');
});
$route->add('/sign-up/', function() {
	setPage('signUp', 'Sign Up');
});
$route->add('/login/', function() {
	setPage('logIn', 'Login To Your Account');
});
$route->add('/logout/', function() {
	setPage('logOut', '...');
});


// check if URL is valid route for view
$route->listen();

// load content
require_once "app/view/header.php";
if($viewContent != NULL){
	echo $viewContent;
} else{
	require_once "app/view/404.php";
}
require_once "app/view/footer.php";
