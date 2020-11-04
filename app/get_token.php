<?php
include_once 'vk.php';

	$v = new Vk(array(
		'client_id' => 34696799, // (обязательно) номер приложения
		'secret_key' => 'mMUU3Jsu3MbmmOjGdYDS', // (обязательно) получить тут https://vk.com/editapp?id=12345&section=options где 12345 - client_id
		'user_id' => 5305539, // ваш номер пользователя в вк
		'scope' => 'wall', // права доступа
		'v' => '5.70' // не обязательно
	));

	$url = $v->get_code_token();

	echo $url;