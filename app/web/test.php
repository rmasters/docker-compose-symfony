<?php

// Debugging process/directory permissions

echo file_get_contents("/etc/passwd") . "\n";
echo sprintf("I am %d:%d\n", posix_getuid(), posix_getgid());

$cache = stat(__DIR__ . '/../app/cache');
echo sprintf("app/cache is %o owned by %d:%d\n", $cache['mode'], $cache['uid'], $cache['gid']);
echo sprintf("app/cache %s writable\n", is_writable(__DIR__ . '/../app/cache') ? "is" : "is not");
echo sprintf("app/cache %s readable\n", is_readable(__DIR__ . '/../app/cache') ? "is" : "is not");

$logs = stat(__DIR__ . '/../app/logs');
echo sprintf("app/logs is %o owned by %d:%d\n", $logs['mode'], $logs['uid'], $logs['gid']);
echo sprintf("app/logs %s writable\n", is_writable(__DIR__ . '/../app/logs') ? "is" : "is not");
echo sprintf("app/cache %s readable\n", is_readable(__DIR__ . '/../app/cache') ? "is" : "is not");
