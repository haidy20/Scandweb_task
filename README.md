# Scandweb_task
Steps to Run the App Locally

1-Clone the repo git clone https://123456789_bit-admin@bitbucket.org/123456789_bit/scandiweb_task.git

2-Go to the project's directory cd scandiweb_task Run composer composer install

3-Create a database and products table which has the following columns: id (INT) (PRIMARY KEY, AUTO INCREMENT) SKU (VARCHAR) (NOT NULL, UNIQUE) name (VARCHAR) (NOT NULL) price (DOUBLE) (NOT NULL) type (VARCHAR) (NOT NULL) size (DOUBLE) height (DOUBLE) width (DOUBLE) length (DOUBLE) weight (DOUBLE)

4-Rename the .env.example file to .env and set the database details

5-Go to the public directory cd public Start the web server php -S 127.0.0.1:8000

Now visit http://127.0.0.1:8000 in the browser
