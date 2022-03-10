<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
echo json_encode( $data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
