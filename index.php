<?php

require_once('inc/init.php');

Response::write('message','Welcome to ' . Config::read('application')['name']);
Response::output();

