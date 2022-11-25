<?php
class Tools {
	static public function Header($title) {
		$strPageTitle = $title;
		require_once(DOCROOT . '/assets/incl/header.php');
	}

	static public function Footer() {
		require_once(DOCROOT . '/assets/incl/footer.php');
	}

	static public function jsonParser($json) {
		header('Content-Type: application/json; charset=utf-8');
		return json_encode($json);
	}
	
	static public function responseArray($status = null, $id = 0) {
		return array(
			'status' => $status,
			'id' => $id
		);

	}
}
?>