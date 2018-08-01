<?php
namespace Controller\Routing;
use Controller\Template as Template;
class GetController extends Abstractions\Response {
	public function getResponse($get) {
		if(empty($get['route'])) $get['route'] = 'Home';
		if($class = $this->match($get)) {
			echo $class->response($get);
		} else {
			http_response_code(404);
			echo Template::notFound(true);
		}
		return;
	}
}