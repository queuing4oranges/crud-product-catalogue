<?php

function redirectUrl($path)
{
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
        $protocol = 'https';
    } else {
        $protocol = 'http';
    } //now redirect to an absolute url:
    header("Location: $protocol://" . $_SERVER['HTTP_HOST'] . $path);
    exit;
}
