<?php 
namespace Controller\Routing;
use Controller\Main as Main;
use Controller\Template as Template;
class Router {
	private $getController = false;
	private $postController = false;
	public function __construct() {
		new Main;
		new Template;
		$this->getController = new GetController;
		$this->postController = new PostController;
	}
	public function dispatchURI() {
		if($_SERVER['REQUEST_METHOD'] == 'GET') {
			$this->getController->getResponse($_GET);
		} else if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->postController->getResponse($_POST);
		}
		return null;
	}
}