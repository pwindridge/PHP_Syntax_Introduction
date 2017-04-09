<?php
/**
 * Demonstrates declaration and use of variables and constants.
 *
 * Output is wrapped in html using the template methods *html*
 * and *display_html()*.
 *
 * @author Philip Windridge <p.c.windridge@staffs.ac.uk>
 *
 * @see /shared/template.php Documentation of html(), and
 * display_html()
 */

/**
 * Include template.php to provide HTML wrapping and output
 */
include __DIR__ . '/../shared/template.php';

$bodySections = array(
        getHtmlSection(
            'header',
            getHtmlSection(
                'h1',
                'Types in PHP'
            ) .
			getHtmlSection(
				'p',
				'For more details on Types see ' .
				htmlLink('http://php.net/manual/en/language.types.intro.php')
			)
        )
    );

$general = getHtmlSection(
	'section',
	getHtmlSection('h2', 'General') .
	getHtmlSection(
		'p',
		'There are nine primitive types in PHP. For this tutorial we will focus on six of them:' .
		getHtmlSection(
			'ul',
			getHtmlSection('li', 'boolean') .
			getHtmlSection('li', 'integer') .
			getHtmlSection('li', 'float (also referred to as double)') .
			getHtmlSection('li', 'string') .
			getHtmlSection('li', 'array (to be dealt with later)') .
			getHtmlSection('li', 'object (to be dealt with later)')
		)
	) .
	getHtmlSection(
		'p',
		'The type of a variable is decided at runtime by PHP depending on the value and the context' .
		' in which the variable is being used. Examples of this will be shown below.'
	) .
	getHtmlSection(
		'p',
		'To force a variable to a type it can be cast or the ' . code('settype()') .
		' function can be used.'
	) .
	getHtmlSection(
		'p',
		'When debugging code, the type of a variable can be shown using the ' . code('var_dump()') .
		' function. For example:'
	) .
	codeBlock(
		array(
			code('$var = \'Hello World\';'),
			code('var_dump($var);')
		)
	) .
	'would result in the output ' . code('string(11) "Hello World"') . '.'
);

$booleanType = 'A boolean literal is specified using the case-insensitive constants <i>true</i> or <i>false</i>:' .
	codeBlock(
		array(
			code('$wellFed = true;')
		)
	) .
	'You can cast to a boolean using ' . code('(bool)') . 'or' . code('(boolean)') . '. However, a value' .
	' will automatically be given a true or false value. All values will equate to ' . code('true') . ' except ' .
	' for the following:' .
	getHtmlSection(
		'ul',
		getHtmlSection('li', code('false')) .
		getHtmlSection('li', '0') .
		getHtmlSection('li', '0.0') .
		getHtmlSection('li', 'an empty string and the string "0"') .
		getHtmlSection('li', 'an array with 0 elements') .
		getHtmlSection('li', code('NULL'))
	)
;

$integerType = 'An integer can be preceded by a <i>+</i> or a <i>-</i> and can be base 10, base 16, base 8 or binary' .
	codeBlock(
		array(
			code('$intDecPos = 1234; // a decimal number'),
			code('$intDecNeg = -123; // a negative number'),
			code('$intOct = 0123; // an octal (base 8) number (preceded by 0 (zero))'),
			code('$intHex = 0x1A; // a hexadecimal (base 16 number (preceded by 0x)'),
			code('$intBin = 0b11111111; // a binary number (preceded by 0b')
		)
	) .
	'An integer that is beyond the bounds of an integer type will be interpreted as a float.'
;

$floatType = 'A floating point number can be specified in any of the following ways:' .
	codeBlock(
		array(
			code('$float1 = 1.234;'),
			code('$float2 = 1.2e3;'),
			code('$float3 = 7E-10;')
		)
	) .
	'Floating point numbers are represented as binary which can have consequences when used in (or resulting from)' .
	' calculations which may appear strange.' .
	' For example the decimal number 0.1 cannot be accurately represented in binary because it is has to be rounded' .
	' in a similar way to the decimal representation of 10 / 3. See (for example) ' .
	htmlLink('http://floating-point-gui.de', 'The Floating Point Guide') . ' for further explanation.'
;

$stringType = 'The string type is covered in the section on ' .
	htmlLink('../02_Basic_Syntax/02_StringValues.php', 'String Values') . '.';

$bodySections[] = $general .
	getHtmlSection('h2', 'Types') .
	getHtmlSection(
    'dl',
    getHtmlSection('dt', 'Boolean Type') .
    getHtmlSection('dd', $booleanType) .
	getHtmlSection('dt', 'Integer Type') .
	getHtmlSection('dd', $integerType) .
	getHtmlSection('dt', 'Float Type') .
	getHtmlSection('dd', $floatType) .
	getHtmlSection('dt', 'String Type') .
	getHtmlSection('dd', $stringType)
);

displayHtml('Types', $bodySections);