## Laravel Transaction Report Web Application

This is a simple web application built using Laravel, PHP, and JavaScript to display a list of transactions and includes specific functionalities.

### Project Requirements

- Laravel (minimum version 7)
- PHP (minimum version 7.4)
- Database : Mysql

### How to Run the Project

1. Clone the project to your local machine.
   ```
   git clone <https://github.com/Fikri32/assessment_source_code_fikri_haidar_nugraha.git>
   ```

2. Install project dependencies using Composer.
   ```
   composer install
   ```

3. Create a local environment file by copying the example.
   ```
   cp .env.example .env
   ```

4. Generate an application key.
   ```
   php artisan key:generate
   ```

5. Configure your database settings in the `.env` file.

6. Migrate and seed the database.
    I have also prepared database migrations and seeds to help you quickly populate the database with sample data.
   ```
   php artisan migrate --seed
   ```

7. Start the development server.
   ```
   php artisan serve
   ```

8. Access the project in your browser at `http://localhost:8000`.

### Features

### Transaction Page
- **Transaction Report Page:** Access the transaction report page to view recorded transactions.
- **Filtering:** Filter transactions by Date, Merchant Name, Payment Status, and Outlet Name.
- **Pagination:** View 10 entries per page.
- **Export Report:** Export transactions as a CSV file.
- **Search Navigation:** Use the search functionality to find specific transactions.

### Merchant Page
- **Merchant CRUD:** Perform Create, Read, Update, and Delete (CRUD) operations on merchants.
- **Searching:** Implement a simple search functionality for merchants.

### Outlet Page 
- **Outlet CRUD:** Perform CRUD operations on outlets.
- **Searching:** Implement a simple search functionality for outlets.

### Staff Page 
- **Staff CRUD:** Perform CRUD operations on staff members.
- **Searching:** Implement a simple search functionality for staff members.

### Customer Page 
- **Customer CRUD:** Perform CRUD operations on customers.
- **Searching:** Implement a simple search functionality for customers.

### Exported Data

- Date Format for the transaction report page and exported CSV is DD-MM-YYYY.
- The CSV file only includes "Paid" transactions and does not show the payment status column.



Thank you for reviewing this project!

---

**Author:** [Fikri Haidar Nugraha]  
