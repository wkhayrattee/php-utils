<?php
use WkUtils\Utility;

$name = 'John Smith';
test("[ok - normal name] - $name", function () use ($name) {
    expect(Utility::isValidTextField($name))->toBeTrue();
});

////https://unicode-table.com/en/emoji/
$name = "💳 19:22:57 Начислено 39239.22р Подтверждение: http://polmoskvy.ru/upload/redir.php?wdhvv 💳";
test("[TRAP name_with_credit_card_emoji] - $name", function () use ($name) {
    expect(Utility::isValidTextField($name))->toBeFalse();
});

////https://unicode-table.com/en/emoji/
$name = "hello mr snow ☃";
test("[TRAP name_with_snow_emoji] - $name", function () use ($name) {
    expect(Utility::isValidTextField($name))->toBeFalse();
});

//https://unicode-table.com/en/blocks/dingbats/
$name = "hello there ✋";
test("[TRAP name_with_dinbats] - $name", function () use ($name) {
    expect(Utility::isValidTextField($name))->toBeFalse();
});

//https://unicode.org/charts/nameslist/c_1F300.html
$name = "Sunny day 🌅";
test("[TRAP name_with_pictograhps] - $name", function () use ($name) {
    expect(Utility::isValidTextField($name))->toBeFalse();
});

//todo: find a method to trap the below symbol - 1F300-1F5FF
//https://unicode.org/charts/nameslist/c_1F300.html
//$name = "Check this symbol ತ";
//test("[TRAP name_with_symbols] - $name", function () use ($name) {
//    expect(Utility::isValidTextField($name))->toBeFalse();
//});

//https://unicode.org/charts/nameslist/c_1F680.html
$name = "I am travelling by 🚗";
test("[TRAP name_with_transport] - $name", function () use ($name) {
    expect(Utility::isValidTextField($name))->toBeFalse();
});

//https://jrgraphix.net/r/Unicode/2600-26FF
$name = "Hello what is this ☸";
test("[TRAP name_with_miscellaneous_symbol] - $name", function () use ($name) {
    expect(Utility::isValidTextField($name))->toBeFalse();
});

$name = "http://polmoskvy.ru/upload/redir.php?wdhvv";
test("[TRAP name_with_url] - $name", function () use ($name) {
    expect(Utility::isValidTextField($name))->toBeFalse();
});

$name = "www.google.com";
test("[TRAP name_with_www] - $name", function () use ($name) {
    expect(Utility::isValidTextField($name))->toBeFalse();
});

$name = "www google.com";
test("[OK to have name_with_www_without_dot] - $name", function () use ($name) {
    expect(Utility::isValidTextField($name))->toBeTrue();
});

$name = "something.ru";
test("[TRAP name_with_ru] - $name", function () use ($name) {
    expect(Utility::isValidTextField($name))->toBeFalse();
});

$name = "somethingru";
test("[OK to have name_with_ru_without_dot] - $name", function () use ($name) {
    expect(Utility::isValidTextField($name))->toBeTrue();
});

$name = "something.php";
test("[TRAP name_with_php] - $name", function () use ($name) {
    expect(Utility::isValidTextField($name))->toBeFalse();
});

$name = "somethingphp";
test("[OK to have name_with_php_without_dot] - $name", function () use ($name) {
    expect(Utility::isValidTextField($name))->toBeTrue();
});

$name = "sadasdasdadasdasdasdasd asdad asdasdasd asdsaa asdasd asdasdasd asdasdasddasd a81";
test("[TRAP Name with more than 80 chars] - $name", function () use ($name) {
    expect(Utility::isValidTextField($name, 80))->toBeFalse();
});

$name = "sadasdasdadasdasdasdasd asdad asdasdasd asdsaa asdasd asdasdasd asdasdasddasd";
test("[OK name with less than 80 chars] - $name", function () use ($name) {
    expect(Utility::isValidTextField($name))->toBeTrue();
});

$name = 'Начислено';
test("[OK non english character] - $name", function () use ($name) {
    expect(Utility::isValidTextField($name))->toBeTrue();
});
$name = 'Persönlichkeiten';
test("[OK non english character] - $name", function () use ($name) {
    expect(Utility::isValidTextField($name))->toBeTrue();
});
