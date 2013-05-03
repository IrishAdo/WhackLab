<?php

function buildSectionPath($section, $fallbackLevel = 0)
{
    if (isset($_COOKIE['security'])) {
        $path = "sections/{$section}/level-{$_COOKIE['security']}.php";
        if (file_exists($path)) {
            return realpath($path);
        } else {
            $path = "sections/{$section}/level-{$fallbackLevel}.php";
            if (file_exists($path)) {
                return realpath($path);
            } else {
                return '404.php';
            }
        }
    } else {
        $path = "sections/{$section}/level-{$fallbackLevel}.php";
        if (file_exists($path)) {
            return realpath($path);
        } else {
            return '404.php';
        }
    }
}