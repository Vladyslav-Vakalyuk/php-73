<?php

use PHPUnit\Framework\TestCase;

class StringsTest extends TestCase
{
    /**
     * @see https://www.php.net/manual/en/language.types.string.php
     */
    public function testVariableParsing()
    {
        $foo = 'world';

        // Double quotes.
        $this->assertEquals('Hello world', "Hello $foo");

        // Single quotes.
        $this->assertEquals('Hello $foo', 'Hello $foo');

        $this->assertEquals('Hello ${foo}', 'Hello ${foo}');

        $this->assertEquals('"Hello " . $foo', '"Hello " . $foo');

        $this->assertEquals('Heredoc', <<<HERE
Heredoc
HERE
        );
        $this->assertEquals('Nowdoc', <<<'EOD'
Nowdoc
EOD
        );
    }

    /**
     * @see https://www.php.net/manual/en/ref.strings.php
     */
    public function testStringFunctions()
    {
        // trim — Strip whitespace (or other characters) from the beginning and end of a string
        $this->assertEquals('Hello', trim('Hello         '));
        $this->assertEquals('Hello', trim('Hello......', '.'));

        // ltrim — Strip whitespace (or other characters) from the beginning of a string
        $this->assertEquals('Hello', ltrim('         Hello'));
        $this->assertEquals('Hello', trim('......Hello', '.'));

        // rtrim — Strip whitespace (or other characters) from the end of a string
        $this->assertEquals('Hello', trim('Hello         '));
        $this->assertEquals('Hello', trim('Hello......', '.'));

        // strtoupper — Make a string uppercase
        $this->assertEquals('HELLO', strtoupper('hello'));

        // strtolower — Make a string lowercase
        $this->assertEquals('hello', strtolower('HeLlO'));

        // ucfirst — Make a string's first character uppercase
        $this->assertEquals('Hello', ucfirst('hello'));

        // lcfirst — Make a string's first character lowercase
        $this->assertEquals('hELLO', lcfirst('HELLO'));

        // strip_tags — Strip HTML and PHP tags from a string
        $this->assertEquals('<h1>hello</h1>', strip_tags('<h1><p>hello</p></h1>', '<h1>'));

        // htmlspecialchars — Convert special characters to HTML entities
        $this->assertEquals('&lt; Hello &gt; World', htmlspecialchars('< Hello > World'));

        // addslashes — Quote string with slashes
        $this->assertEquals('H\"e\"l\"l\"o\" W\"o\"r\"l\"d\"', addslashes('H"e"l"l"o" W"o"r"l"d"'));

        // strcmp — Binary safe string comparison
        $this->assertEquals(0, strcmp('Hello World', 'Hello World'));

        // strncasecmp — Binary safe case-insensitive string comparison of the first n characters
        $this->assertEquals(0, strncasecmp('Hello World', 'Hell World', 2));

        // str_replace — Replace all occurrences of the search string with the replacement string
        $this->assertEquals('World World', str_replace('Hello', 'World', 'Hello World'));

        // strpos — Find the position of the first occurrence of a substring in a string
        $this->assertEquals('1', strpos('Hello', 'e'));

        // strstr — Find the position of the first occurrence of a substring in a string
        $this->assertEquals('ello', strstr('Hello', 'e'));

        // strrchr — Find the last occurrence of a character in a string
        $this->assertEquals('lo', strrchr('Hello', 'l'));

        // substr — Return part of a string
        $this->assertEquals('He', substr('Hello', 0,2));

        // sprintf — Return a formatted string
        $this->assertEquals('Hello new World', sprintf('Hello %s World', 'new'));
    }
}