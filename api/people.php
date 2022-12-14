<?php
//Симуляция  -обычно тут программный код, который извлекает код из БД
$people = [
    array("firstName" => "Yuri", "lastName" => "Andrienko", "salary" => 123456 ),
    array("firstName" => "Vasya", "lastName" => "Pupkin", "salary" => 77777 ),
    array("firstName" => "Yulia", "lastName" => "Yulkina", "salary" => 30000 ),
    array("firstName" => "Andrey", "lastName" => "Andreev", "salary" => 30000 ),
];

$letters = strtolower($_REQUEST["letters"]);
$results = [];
foreach($people as $person) {
    if (str_starts_with(strtolower($person["lastName"]), $letters)) {
        array_push($results, $person);

    }
}

echo (json_encode($results));
