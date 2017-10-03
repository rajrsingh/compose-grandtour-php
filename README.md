# The Grand Tour - PHP
A set of example applications that will add word/definition pairs to a database running on Compose.

This repo contains the apps written in PHP 5.6.30.

## Running the Example
To run from the command-line:

  * Make sure you have a web server running on your computer that can execute PHP 5.5+ and has the appropriate driver installed for the database you are using
  * Clone this repo to the root of your web server's document directory
  * Navigate to the example-<_db_> directory
  * In the file `example-<_db_>/example-<_db_>/.php`, change the connection variables to match those of your Compose database instance.
  * And then in your browser: `http://localhost/php/example-<_db_>/templates/index.html`

The application will be served on 127.0.0.1 and can be opened in a browser.
