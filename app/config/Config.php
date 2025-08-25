<?php
// Global configuration
// Toggle environment
const ENV = 'dev'; // change to 'prod' in production

// Database settings
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'trms';
const DB_PORT = 3306;

// Base URL - dynamically determined so the app works from any directory
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host   = $_SERVER['HTTP_HOST'] ?? 'localhost';
$scriptDir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/')), '/');
$baseUrl = $scheme . '://' . $host . ($scriptDir === '' ? '' : $scriptDir) . '/';
define('BASE_URL', $baseUrl);

// CSRF token name
const CSRF_TOKEN_NAME = '_csrf';

// Derived base path from BASE_URL
 $parsed = parse_url(BASE_URL, PHP_URL_PATH);
 if ($parsed === null) {
     throw new Exception('Invalid BASE_URL');
 }
 $basePath = rtrim($parsed, '/') . '/';
 // expose BASE_PATH
 define('BASE_PATH', $basePath);

// Helper to build absolute URLs
function url(string $path = ''): string {
    return rtrim(BASE_URL, '/') . '/' . ltrim($path, '/');
}

// Error reporting based on environment
if (ENV === 'dev') {
    ini_set('display_errors', '1');
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', '0');
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
}
