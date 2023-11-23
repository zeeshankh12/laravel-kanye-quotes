# Kanye West Quotes API Laravel Application

A Laravel application that connects to the Kanye West Quotes API.

## Getting Started

1. **Clone the Repository:**

    ```bash
    git clone https://github.com/zeeshankh12/laravel-kanye-quotes.git
    ```

2. **Install Dependencies:**

    ```bash
    composer install
    ```

3. **Set Up Environment Variables:**

    Copy the `.env.example` file to create a new `.env` file:

    ```bash
    cp .env.example .env
    ```

    Edit the `.env` file and set your database connection and other relevant configurations.

4. **Generate Application Key:**

    ```bash
    php artisan key:generate
    ```

5. **Run Migrations:**

    ```bash
    php artisan migrate
    ```

6. **Start the Development Server:**

    ```bash
    php artisan serve
    ```

    Your application should now be running at [http://localhost:8000](http://localhost:8000).

7. **Add API Token in Env file:**
    ```bash
    API_TOKEN="zeeshan-khalid"
    ```

## API Endpoints

- **Get 5 Random Kanye West Quotes:**

    ```bash
    GET /api/quotes
    ```

- **Refresh Quotes and Fetch the Next 5 Random Quotes:**

    ```bash
    GET /api/quotes/refresh
    ```

## Authentication

Authentication for these APIs should be done with an API token. Include the API token in the `Authorization` header of your requests.

## Running Tests

Run both feature and unit tests:

```bash
php artisan test
