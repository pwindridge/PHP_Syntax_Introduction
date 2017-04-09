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
                'Statements and Code Blocks'
            )
        )
    );


$statement = 'Statements usually end with a semi-colon (;) -' . code('$var = \'Hello World\';');
$groupedStatements = 'A number of statements can be grouped together and treated as one by enclosing them in curly' .
    ' braces ({...})';

$bodySections[] = getHtmlSection(
    'dl',
    getHtmlSection('dt', 'Statements') .
    getHtmlSection('dd', $statement) .
    getHtmlSection('dt', 'Code Blocks') .
    getHtmlSection('dd', $groupedStatements)
);


displayHtml('Statements', $bodySections);