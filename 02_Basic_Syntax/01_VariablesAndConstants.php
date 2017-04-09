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
                'Declaring and Using Variables and Constants'
            )
        )
    );


$var = 'Variables begin with a dollar sign ($).';
$Var = 'Variables are case sensitive so that $var is a different variable to $Var.';
$vAr = 'By convention, variables are named using camelCase. So $var rather than $Var or $varText rather than $VarText.';
$vaR = 'Variables are assigned by value by default';

$varByReference = &$vaR;
$varByReference = $varByReference .
    '  - you can assign a variable by reference by prepending an ampersand (&) - ' . code('$varRef = &$var;') .
    'Changes made using $varRef will also be seen using $var.';

$bodySections[] = getHtmlSection(
    'dl',
    getHtmlSection('dt', 'Variables') .
    getHtmlSection('dd', $var) .
    getHtmlSection('dd', $Var) .
    getHtmlSection('dd', $vAr) .
    getHtmlSection('dd', $vaR)
);

define(
    'CONSTANT_VAR',
    'Constants can be defined using the define() function - ' .
        code('define(\'MILES_TO_KM\', 1.6);') .
        ' By convention constants are named using all capitals.'
);
const ANOTHER_CONSTANT_VAR = 'Constants can also be defined using the const keyword although you tend to see this' .
    ' in class definitions where the define() function cannot be used.' .
    '<div class="code_example"><code>const MILES_TO_KM = 1.6;</code></div>' .
    'It is to be noted that const is restricted to scalar types (int, float, string or boolean).';

$bodySections[] = getHtmlSection(
    'dl',
    getHtmlSection('dt', 'Constants') .
    getHtmlSection('dd', CONSTANT_VAR) .
    getHtmlSection('dd', ANOTHER_CONSTANT_VAR)
);

displayHtml('Variables and Constants', $bodySections);