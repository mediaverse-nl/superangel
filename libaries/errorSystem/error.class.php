<?php

	/**
	.---------------------------------------------------------------------------.
	| The error systeem                                                         |
	| ------------------------------------------------------------------------- |
	| Versoin: 0.0.2            												|
	| Author: Deveron Reniers                   								|
	| latest update: 14/11/15                   								|
	| ------------------------------------------------------------------------- |
	'---------------------------------------------------------------------------'
	 */

namespace Error;

class ES{

	public static function GetResponsCode($code = 200){

		//default value
		$text = array();

		if ($code !== 200) {

			switch ($code) {
				case 100: $text = array(100, 'Continue'); break;
				case 101: $text = array(101, 'Switching Protocols'); break;
				case 200: $text = array(200, 'OK'); break;
				case 201: $text = array(201, 'Created'); break;
				case 202: $text = array(202, 'Accepted'); break;
				case 203: $text = array(203, 'Non-Authoritative Information'); break;
				case 204: $text = array(204, 'No Content'); break;
				case 205: $text = array(205, 'Reset Content'); break;
				case 206: $text = array(206, 'Partial Content'); break;
				case 300: $text = array(300, 'Multiple Choices'); break;
				case 301: $text = array(301, 'Moved Permanently'); break;
				case 302: $text = array(302, 'Moved Temporarily'); break;
				case 303: $text = array(303, 'See Other'); break;
				case 304: $text = array(304, 'Not Modified'); break;
				case 305: $text = array(305, 'Use Proxy'); break;
				case 400: $text = array(400, 'Bad Request'); break;
				case 401: $text = array(401, 'Unauthorized'); break;
				case 402: $text = array(402, 'Payment Required'); break;
				case 403: $text = array(403, 'Forbidden', 'The server has refused to fulfill your request.'); break;
				case 404: $text = array(404, 'Not Found'); break;
				case 405: $text = array(405, 'Method Not Allowed'); break;
				case 406: $text = array(406, 'Not Acceptable'); break;
				case 407: $text = array(407, 'Proxy Authentication Required'); break;
				case 408: $text = array(408, 'Request Time-out'); break;
				case 409: $text = array(409, 'Conflict'); break;
				case 410: $text = array(410, 'Gone'); break;
				case 411: $text = array(411, 'Length Required'); break;
				case 412: $text = array(412, 'Precondition Failed'); break;
				case 413: $text = array(413, 'Request Entity Too Large'); break;
				case 414: $text = array(414, 'Request-URI Too Large'); break;
				case 415: $text = array(415, 'Unsupported Media Type'); break;
				case 500: $text = array(500, 'Internal Server Error'); break;
				case 501: $text = array(501, 'Not Implemented'); break;
				case 502: $text = array(502, 'Bad Gateway'); break;
				case 503: $text = array(503, 'Service Unavailable'); break;
				case 504: $text = array(504, 'Gateway Time-out'); break;
				case 505: $text = array(505, 'HTTP Version not supported'); break;
				default:
					$text = array(htmlentities($code), 'Unknown http status code "' . htmlentities($code) . '"'); break;
					break;
			}
			//including error page
			include $_SERVER['DOCUMENT_ROOT'] . '/libaries/errorSystem/ErrorTemplate.php';
			exit;

		} else {
			//default code
			$code = 200;
		}
		//returning multiple arrays
		return $text;
	}

}



?>