Steps to Run the App Locally
Clone the repo
git clone https://123456789_bit-admin@bitbucket.org/123456789_bit/scandiweb_task.git
Go to the project's directory
cd scandiweb_task
Run composer
composer install
Create a database and products table which has the following columns:
id (INT) (PRIMARY KEY, AUTO INCREMENT)
SKU (VARCHAR) (NOT NULL, UNIQUE)
name (VARCHAR) (NOT NULL)
price (DOUBLE) (NOT NULL)
type (VARCHAR) (NOT NULL)
size (DOUBLE)
height (DOUBLE)
width (DOUBLE)
length (DOUBLE)
weight (DOUBLE)
Rename the .env.example file to .env and set the database details
Go to the public directory
cd public
Start the web server
php -S 127.0.0.1:8000
Now visit http://127.0.0.1:8000 in the browser
My Approach to Completing the Task
I built a simple MVC pattern to use as the core of the project through which I had the opportunity to learn more about how frameworks basically work behind the scenes and to apply SOLID principles and utilize some other design patterns like the Singleton and Strategy.