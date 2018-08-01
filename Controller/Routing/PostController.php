<?php
namespace Controller\Routing;
class PostController extends Abstractions\Response {
	public function getResponse($post) {
		if($class = $this->match($post)) {
			echo json_encode([
				'error' => null,
				'response' => $class->response($post)
			]);
		} else {
			http_response_code(404);
			echo json_encode([
				'error' => 'Not Found',
				'response' => null
			]);
		}
		return;
	}
}