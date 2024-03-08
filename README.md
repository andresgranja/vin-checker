# Laravel Vue Project

This project is a web application built with Laravel, Vue.js, and Tailwind CSS. It features a user registration and login system, providing a basic template to start from for more complex applications. Follow the instructions below to set up and run the project on your local machine.

## Prerequisites

Before you begin, ensure you have the following installed on your local machine:
- PHP (version as required by the Laravel version you're using, typically >= 7.3)
- Composer
- Node.js and npm
- A database system (MySQL, PostgreSQL, etc.)

## Installation

1. **Clone the Repository**

    ```bash
    git clone https://your-repository-url.git
    cd your-project-directory
    ```

2. **Install PHP Dependencies**

    ```bash
    composer install
    ```

3. **Install JavaScript Dependencies**

    ```bash
    npm install
    ```

4. **Copy Environment File**

    ```bash
    cp .env.example .env
    ```

5. **Generate Application Key**

    ```bash
    php artisan key:generate
    ```

6. **Set Up Your Environment**

    Open the `.env` file in your favorite text editor and update the database and any other environment settings specific to your setup.

7. **Run Database Migrations**

    ```bash
    php artisan migrate
    ```

8. **Compile Assets**

    For development:
    ```bash
    npm run dev
    ```
    For production:
    ```bash
    npm run prod
    ```

## Running the Project

1. **Start the Laravel Development Server**

    ```bash
    php artisan serve
    ```
    This command will start a development server at `http://localhost:8000`.

2. **Accessing the Application**

    Open your web browser and visit `http://localhost:8000` to see the application in action. You should be able to register a new user and log in.


