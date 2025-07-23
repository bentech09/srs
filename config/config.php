<?php
/* parse settings */
$configPath = __DIR__ . '\settings.ini';
if (!file_exists($configPath)) {
  die("Not found: settings.ini");
}

$config = parse_ini_file($configPath, true);
if ($config === false) {
  die("Cannot read: settings.ini");
}
/* parse settings */
