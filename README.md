Web Hack Lab
===

Web Hack Lab is a web application intentionally written to have multiple vulnerabilities such as several types of injections,
cross-site scripting, authentication, etc...

*Warning:* This application must NOT be install on public servers.

The configuration.php required is not pushed because the values is based on each developer, so if you want to fork and
work on WhackLab please create configuration.php and add the following

```php
return array(
    'db' => array(
        'hostname' => 'yourhost',
        'username' => 'youruser',
        'password' => 'yourpass',
        'database' => 'yourdbname'
    )
);
```