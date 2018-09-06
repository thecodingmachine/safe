<?php

namespace Safe;

/**
 * Creates a new button.
 * 
 * @param int $left X-coordinate of the button.
 * @param int $top Y-coordinate of the button.
 * @param string $text The text which should be displayed in the button.
 * @return resource Returns a resource link to the created button component, .
 * @throws Exceptions\NewtException
 * 
 */
function newt_button(int $left, int $top, string $text)
{
    error_clear_last();
    $result = \newt_button($left, $top, $text);
    if ($result === FALSE) {
        throw Exceptions\NewtException::createFromPhpError();
    }
    return $result;
}


/**
 * Create a new form.
 * 
 * @param resource $vert_bar Vertical scrollbar which should be associated with the form
 * @param string $help Help text string
 * @param int $flags Various flags
 * @return resource Returns a resource link to the created form component, .
 * @throws Exceptions\NewtException
 * 
 */
function newt_form($vert_bar, string $help, int $flags)
{
    error_clear_last();
    if ($flags !== null) {
        $result = \newt_form($vert_bar, $help, $flags);
    } elseif ($help !== null) {
        $result = \newt_form($vert_bar, $help);
    } elseif ($vert_bar !== null) {
        $result = \newt_form($vert_bar);
    }else {
        $result = \newt_form();
    }
    if ($result === FALSE) {
        throw Exceptions\NewtException::createFromPhpError();
    }
    return $result;
}


