<?php
use WkUtils\Utility;

/*
 * First Sentence - Short & 49 chars long
 */
test('[This first sentence is 49 chars long] Read: "' . shortSentence49() . '"', function () {
    $sentence = shortSentence49();
    expect(strlen($sentence))->toBe(49);
});
test('That first sentence will remain same', function () {
    $sentence = shortSentence49();
    $truncated_sentence = Utility::truncateSentence($sentence);

    expect($truncated_sentence)->toEqual($sentence);
});


/*
 * 2nd Sentence - Long and 137 chars long
 *
 * AIM: To show trimming after word "be"
 */
test('[This 2nd sentence is 137 chars long] Read: "' . sentence137() . '"', function () {
    $sentence = sentence137();
    expect(strlen($sentence))->toBe(137);
});
test('The 2nd sentence will be truncated be EQUAL to "' . sentence137Expected() . '"', function () {
    $sentence = sentence137();
    $sentenceExpected = sentence137Expected();

    $truncated_sentence = Utility::truncateSentence($sentence, 60, "...");
    expect($truncated_sentence)->toEqual($sentenceExpected);
});

/*
 * 3rd sentence is a slightly modified version of 2nd Sentence
 * but still at 137 chars
 *
 * AIM: To show trimming after word "should" instead of "be" as in above
 */
test('[This 3rd sentence is 137 chars long] Read: "' . sentence137modified() . '"', function () {
    $sentence = sentence137modified();
    expect(strlen($sentence))->toBe(137);
});
test('The 3rd sentence will be truncated be EQUAL to "' . sentence137modifiedExpected() . '"', function () {
    $sentence = sentence137modified();
    $sentenceExpected = sentence137modifiedExpected();

    $truncated_sentence = Utility::truncateSentence($sentence, 60, "...");
    expect($truncated_sentence)->toEqual($sentenceExpected);
});
