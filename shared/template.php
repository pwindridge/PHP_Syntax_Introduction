<?php
/**
 * Wrap and output content in HTML.
 *
 * @author Philip Windridge <p.c.windridge@staffs.ac.uk>
 */

/**
 * Text output of a HTML page and content.
 *
 * @param string $headTitle Title content for the <title> element of the Web page
 * @param string[] $bodySections An array of HTML body elements
 *
 * @return void
 */
function displayHtml($headTitle = '', $bodySections = array()) {
    $body_content = implode("\n", $bodySections);

    echo <<<HTML_TEMPLATE
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$headTitle</title>
    <link rel="stylesheet" type="text/css" href="../shared/display.css">
</head>
<body>
$body_content
</body>
</html>
HTML_TEMPLATE;
}

/**
 * Create an HTML element with content.
 *
 * @param string $outerElementName The name of the outer HTML element
 * @param string $content Content of the HTML element
 *
 * @return string Content with HTML mark-up
 */
function getHtmlSection($outerElementName, $content) {
    return <<<HTML_SECTION
<$outerElementName>
$content
</$outerElementName>
HTML_SECTION;
}

/**
 * Mark up tabular data in HTML.
 *
 * @param string[] $tabularData Information to be displayed in the table as an array
 * @return string HTML marked-up tabular data
 */
function getTable($tabularData) {
    $table = '<table>';
    if(isset($tabularData['caption'])) {
        $table .= '<caption>' . $tabularData['caption'] . '</caption>';
    }
    if(isset($tabularData['head'])) {
        $table .= getHtmlTableSection('thead', $tabularData['head']);
    }
    if(isset($tabularData['foot'])) {
        $table .= getHtmlTableSection('tfoot', $tabularData['head']);
    }
    if(isset($tabularData['body'])) {
        foreach($tabularData['body'] as $body) {
            $table .= getHtmlTableSection('tbody', $body);
        }
    }
    return $table .= '</table>';
}

/**
 * Mark up a head, body or foot table section.
 *
 * @param string $section The section of table being marked up (thead, tfoot or tbody)
 * @param string[] $rows The rows of data to be marked up
 * @return string The table section marked up with HTML
 */
function getHtmlTableSection($section, $rows) {
    $td = array('thead'=>'th', 'tfoot'=>'td', 'tbody'=>'td');
    $tableSection = '<' . $section . '>';
    foreach($rows as $row) {
        $tableSection .=
            '<tr><' . $td[$section] . '>' .
            implode('</' . $td[$section] . '><' . $td[$section] . '>', $row) .
            '</' . $td[$section] . '></tr>';
    }
    return $tableSection .= '</'. $section . '>';
}

/**
 * Mark up one or more lines of code.
 *
 * @param string[] $linesOfCode An array containing lines of code to be marked-up
 *
 * @return string The marked-up HTML
 */
function codeBlock($linesOfCode) {
    $codeMarkUp = '<div class="code_example">';
    $codeMarkUp .= implode(' ', $linesOfCode);
    return $codeMarkUp . '</div>';
}

/**
 * Mark up inline text as code.
 *
 * @param string $text The text that is to be marked-up as code
 * @param int $indentLevel The level of indentation if part of a code block
 * @return string Text that has been marked-up as code
 */
function code($text, $indentLevel = 0) {
    return '<code class="indent_' . $indentLevel . '">' . clean($text) . '</code>';
}

/**
 * Mark up a link with the HTML anchor tag.
 *
 * @param string $url The url for the link
 * @param string $text The name of the link
 * @return string The marked-up anchor tag
 */
function htmlLink($url, $text = null) {
    $text = $text ? $text : $url;
    return '<a href="' . $url . '">' . clean($text) . '</a>';
}

/**
 * Escape characters that could be misinterpreted by a browser.
 *
 * @param string $htmlOutput The HTML string to be sent to the client
 *
 * @return string The resulting HTML string
 */
function clean($htmlOutput) {
    return htmlentities($htmlOutput, ENT_QUOTES);
}

function var_dump_str($var) {
	ob_start();
	var_dump($var);
	return ob_get_clean();
}