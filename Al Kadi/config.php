<?php
session_start();

// Set default language
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'en'; // Default language is English
}

// Change language if user selects another language
if (isset($_GET['lang']) && in_array($_GET['lang'], ['en', 'ar'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

// Load the language file
$lang = include "lang_{$_SESSION['lang']}.php";
?>
