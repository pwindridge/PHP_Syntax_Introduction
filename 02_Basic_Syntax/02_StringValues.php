<?php
/**
 * Demonstrates different ways to create strings.
 *
 * Shows the syntax for creating strings in four different ways. These ways are:
 *
 * * Single quotes
 * * Double quotes
 * * The *heredoc* syntax
 * * The *nowdoc* syntax
 *
 * Output is wrapped in html using the template methods *html* and *display_html()*.
 *
 * @author Philip Windridge <p.c.windridge@staffs.ac.uk>
 *
 * @see /shared/template.php Documentation of html(), and display_html()
 */

/**
 * Include template.php to provide HTML wrapping and output
 */
include __DIR__ . '/../shared/template.php';

$bodySections = array(
        getHtmlSection('header', getHtmlSection('h1', 'Creating String Values'))
);


$singleQuotes = 'Strings created using single quotes must tbe surrounded by single quotes (\'...\')';
$doubleQuotes = "Strings created using double quotes must be surrounded by double quotes (\"...\")";
$hereDoc = <<<STRING
Strings created using the heredoc syntax begin with the <<< operator followed immediately by an
identifier and a new line. They are closed by an identifier that must appear on a new line beginning
at the first character position (no spaces or tabs). The closing identifier is immediately followed
by a semi-colon (;).
STRING;
$nowDoc = <<<'STRING'
Strings created using the nowdoc syntax follow a similar form to the heredoc syntax but with the
initial identifier surrounded by single quotes ('...').
STRING;

$bodySections[] = getHtmlSection(
    'dl',
    getHtmlSection('dt', 'Using Single Quotes') .
    getHtmlSection('dd', clean($singleQuotes)) .
    getHtmlSection('dt', 'Using Double Quotes') .
    getHtmlSection('dd', clean($doubleQuotes)) .
    getHtmlSection('dt', 'Using the heredoc Syntax') .
    getHtmlSection('dd', clean($hereDoc)) .
    getHtmlSection('dt', 'Using the nowdoc Syntax') .
    getHtmlSection('dd', clean($nowDoc))
);


displayHtml('String Values', $bodySections);