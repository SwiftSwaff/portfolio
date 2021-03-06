<?php
if (!defined('IndexAccessed')) {
    die('Direct access not permitted');
}
?>

<nav class='navbar'>
    <button name='navbar-ham' aria-label='Dropdown Menu' class='navbar-ham'>
        <svg viewBox="0 0 26 26" width="26" height="26">
            <rect width="26" height="4" stroke="white" fill="white"></rect>
            <rect y="10" width="26" height="4" stroke="white" fill="white"></rect>
            <rect y="20" width="26" height="4" stroke="white" fill="white"></rect>
        </svg>
    </button>
    <ul class='navbar-container'>
        <li class='navbar-elem'><a href='/'>Home</a></li>
        <li class='navbar-elem'>
            <a href='javascript:'>Projects</a>
            <ul class='navbar-dropdown d1'>
                <li class='navbar-elem'><a href='/overviews/trading_game'>Trading Game API</a></li>
                <li class='navbar-elem'><a href='/overviews/custom_cms'>Custom CMS</a></li>
                <li class='navbar-elem'><a href='/overviews/resume_template'>Resume Template</a></li>
                <li class='navbar-elem'><a href='/overviews/countdown'>Countdown</a></li>
            </ul>
        </li>
    </ul>
</nav>