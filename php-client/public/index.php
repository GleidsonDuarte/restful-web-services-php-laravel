<?php

include_once '../bootstrap/start.php';

function login()
{
	$email = 'carlos@especializa.com.br';
	$password = '123456';

	$curl = curl_init();

	curl_setopt_array($curl, [
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => [
			'email' => $email,
			'password' => $password,
		],
		CURLOPT_URL => 'http://localhost:8000/api/auth'
	]);

	$response = json_decode(curl_exec($curl));

	curl_close($curl);

	return $response->token;
}

function products($token)
{
	$curl = curl_init();

	curl_setopt_array($curl, [
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_URL => 'http://localhost:8000/api/products',
		CURLOPT_HTTPHEADER => [
			"Authorization: Bearer {$token}"
		]
	]);

	$response = json_decode(curl_exec($curl));

	curl_close($curl);

	return $response;
}

$token = login();

$products = products($token);

if (isset($products->data) && count($products->data) > 0) {
	$products = $products->data;

	foreach ($products->data as $product) {
		echo "<p>Nome: {$product->name}</p>";
		echo "<p>Descrição: {$product->description}</p>";
		echo '<hr>';
	}
} else {
	echo 'Nenhum produto cadastrado!';
}