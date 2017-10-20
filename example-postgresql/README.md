# Connecting to PostgreSQL from a PHP App

## Connection String

The connection string provided by your Compose PostgreSQL deployment should go into the file `env.php`.

## Running the Application

To run from the command-line:

* Rename the file `env.template.php` to `env.php`
* In that file change the connection variables to match those of your Compose database instance. The string will have this format:<br>
`postgres://username:password@servername.com:port/compose`
* And then in your browser: `http://localhost/php/example-postgresql/templates/index.html`

The application will be served on your localhost and can be opened in a browser.
