<?php

namespace Safe;

/**
 * Clears the screen completely without setting blanks.
 * 
 * Note: ncurses_clear clears the screen without
 * setting blanks, which have the current background rendition. To
 * clear screen with blanks, use ncurses_erase.
 * 
 * @throws Exceptions\NcursesException
 * 
 */
function ncurses_clear(): void
{
    error_clear_last();
    $result = \ncurses_clear();
    if ($result === FALSE) {
        throw Exceptions\NcursesException::createFromPhpError();
    }
}


/**
 * Erases all lines from cursor to end of screen and creates blanks. Blanks
 * created by ncurses_clrtobot have the current 
 * background rendition.
 * 
 * @throws Exceptions\NcursesException
 * 
 */
function ncurses_clrtobot(): void
{
    error_clear_last();
    $result = \ncurses_clrtobot();
    if ($result === FALSE) {
        throw Exceptions\NcursesException::createFromPhpError();
    }
}


/**
 * Erases the current line from cursor position to the end. Blanks created by
 * ncurses_clrtoeol have the current background
 * rendition.
 * 
 * @throws Exceptions\NcursesException
 * 
 */
function ncurses_clrtoeol(): void
{
    error_clear_last();
    $result = \ncurses_clrtoeol();
    if ($result === FALSE) {
        throw Exceptions\NcursesException::createFromPhpError();
    }
}


/**
 * Compares the virtual screen to the physical screen and updates the
 * physical screen. This way is more effective than using multiple refresh
 * calls.
 * 
 * @throws Exceptions\NcursesException
 * 
 */
function ncurses_doupdate(): void
{
    error_clear_last();
    $result = \ncurses_doupdate();
    if ($result === FALSE) {
        throw Exceptions\NcursesException::createFromPhpError();
    }
}


/**
 * Fills the terminal screen with blanks.
 * 
 * Created blanks have the current background rendition, set by
 * ncurses_bkgd.
 * 
 * @throws Exceptions\NcursesException
 * 
 */
function ncurses_erase(): void
{
    error_clear_last();
    $result = \ncurses_erase();
    if ($result === FALSE) {
        throw Exceptions\NcursesException::createFromPhpError();
    }
}


/**
 * Initializes soft label key functions
 * 
 * This function must be called before ncurses_init
 * or ncurses_newwin is called.
 * 
 * @param int $format If ncurses_init eventually uses a line from
 * stdscr to emulate the soft labels, then this parameter determines how
 * the labels are arranged of the screen.
 * 
 * 0 indicates a 3-2-3 arrangement of the labels, 1 indicates a 4-4
 * arrangement and 2 indicates the PC like 4-4-4 mode, but in addition an
 * index line will be created.
 * @throws Exceptions\NcursesException
 * 
 */
function ncurses_slk_init(int $format): void
{
    error_clear_last();
    $result = \ncurses_slk_init($format);
    if ($result === FALSE) {
        throw Exceptions\NcursesException::createFromPhpError();
    }
}


