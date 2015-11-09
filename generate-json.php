<?php 

$jsonData = $_POST['jsonData'];

function storeJson($data, $fileName = 'json-file')
{
	if (empty($data)) {
	    return false;
	}

	$fileName = time() . '-' . $fileName . '.json';
	$filePath = 'temp/' . $fileName;

	$handle = fopen($filePath, 'w');
	fwrite($handle, json_encode($data));
	fclose($handle);

	if ( file_exists( $filePath )) {
		return $filePath;
	} else {
		return false;
	}
}

$path = storeJson( $jsonData );

if ( $path !== false ) {
	echo json_encode([ 'filePath' => $path ]);
} else {
	echo json_encode([ 'filePath' => '' ]);
}