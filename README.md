## Installation
1. Clone this repository.
    "https://github.com/shbaxhaku/Calculator-app.git"
2. Navigate to the project directory.
3. Install dependencies using Composer: `composer install`
    "Composer version 2.5.5 2023-03-21 11:50:05"
4. Create a `.env` file by copying `.env.example` and configuring your database and other environment settings
5. Install dependencies using Node : `npm install`
    "Node version 18.0.0,Npm version 8.6.0"
6. Run migration and seeder `php artisan migrate`
    `php .\artisan migrate --seed`
7. Start the development server: `php artisan serve`

## Usage
-Visit the homepage  `http://localhost:8000`
Login in with email=test@example.com and password=password


## API Documentation
This project uses a RESTful API for performing calculations. Below are the details of the API:

- **Base URL**: `http://127.0.0.1:8000/api/calculateApi`

- **POST /calculateApi**
    - Description: Calculate a mathematical expression.
    - Request Body: JSON object with `expression` field.
    - Example: `POST http://127.0.0.1:8000/api/calculateApi


## Using Expressions

In this project, you can perform mathematical calculations using the expression feature. Here's how to use it:

1. Enter a mathematical expression in the body as raw json and send it.

Example expression: `1+1`
Example expression: `1-1`
Example expression: `1*1`
Example expression: `1/1`
{
"expression": "1+1"
}

2. The result will be displayed in the result field.

Example:

- Expression: `1+1`
- Result: `2`
