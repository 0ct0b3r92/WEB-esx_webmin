# EsxManager
based on Laravel 5.6

This is a work in progress.

## Apache
Laravel includes a public/.htaccess file that is used to provide URLs without the index.php front controller in the path. 
Before serving Laravel with Apache, be sure to enable the mod_rewrite module so the .htaccess file will be honored by the server.
If the .htaccess file does not work with your Apache installation, try this alternative:

Options +FollowSymLinks
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]

## Nginx
If you are using Nginx, the following directive in your site configuration will direct all requests to the  index.php front controller:

location / {
    try_files $uri $uri/ /index.php?$query_string;
}

## License

The EsxManager is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
