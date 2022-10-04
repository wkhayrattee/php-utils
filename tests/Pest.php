<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

// uses(Tests\TestCase::class)->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

//expect()->extend('toBeOne', function () {
//    return $this->toBe(1);
//});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function shortSentence49()
{
    return 'This is a short sentence with 49 characters long.';
}

function sentence137()
{
    return 'This is a sentence with 137 characters long and should be trimmed at 60 chars with a stop at a complete word instead of a character trim.';
}
function sentence137Expected()
{
    return 'This is a sentence with 137 characters long and should be...';
}

function sentence137modified()
{
    return 'This is a sentence with 137 characters long and should trimmed be at 60 chars with a stop at a complete word instead of a character trim.';
}
function sentence137modifiedExpected()
{
    return 'This is a sentence with 137 characters long and should...';
}
