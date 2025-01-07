# Installation Guide for OOH Vet Wait Time Estimate

## Prerequisites

Before you start, ensure you have the following installed on your server or local environment:

- **PHP** (Version 7.4 or higher)
- **MySQL** (Version 5.7 or higher)
- **Web Server** (Apache or Nginx recommended)
- **phpMyAdmin** or **MySQL Workbench** (Optional for database management)

## Step 1: Download or Clone the Repository

If you haven't already, download or clone the repository:

```bash
git clone https://github.com/your-username/ooh-vet-wait-time-estimate.git
```

Alternatively, you can download the ZIP file from the repository and extract it.

## Step 2: Set Up the Web Server

1. Place the project files in the **public** folder of your web server.
2. Ensure that your server is configured to serve PHP files correctly. For Apache, this typically involves enabling PHP and ensuring your `.htaccess` file is correctly configured.

**Apache Configuration:**

Make sure to have these configurations in your `.htaccess` file:

```
# Enable the RewriteEngine
RewriteEngine On

# Rewrite URLs ending without a trailing slash
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME}\.php -f
RewriteRule ^([^/]+)/?$ $1.php [L]

# Redirect requests with .php extension to clean URL
RewriteCond %{THE_REQUEST} /([^.]+)\.php [NC]
RewriteRule ^ /%1 [R=301,L]

```
This ensure you will be able to access the site without issues.


## Step 3: Configure the Database

1. Log in to your MySQL database server and create a new database for the application. For example:

```sql
CREATE DATABASE vet_waiting_time;
```

2. Import the provided database structure. You can do this by either:

   - Using **phpMyAdmin**: Navigate to the `Import` section and upload the `vet_waiting_time.sql` file.
   - Using **MySQL Workbench**: Use the `File` -> `Open SQL Script` option to run the SQL queries.

3. You will need to modify the `db_connector.php` file to set your database credentials (different for each clinic). Open the file and update the following lines:

```php
$host = "localhost"; // Database Host
$dbname = "vet_waiting_times"; // Database Name
$username = "root"; // Database Username
$password = "password"; // Database Password
$table = "clinic 1"; // Database Table (Clinic Name/identifer)
```

Make sure to replace the placeholders with your actual database details.

## Step 4: Configure Your Main Application

1. Open the `config.php` In Main Directory file and configure any other necessary parameters such as:

    - Parent Company name
    - List of different Clinics, and their folder name (e.g. clinc-1)
    - Promotional Material
    - More coming in Version 2.0
    
2. Save the file after making the changes.

## Step 5: Configure Your Individual Clinic Application

1. Open the `config.php` In a clinics directory file and configure any other necessary parameters such as:

    - Clinic's Details
    - Clinic's Login Info
    - More coming in Version 2.0
    
2. Save the file after making the changes.

## Step 6: Other Configurable options

Because this is an Open Source Software, you are free to customise and alter things to your requirements, We

## Step 7: Testing the Installation

1. Navigate to the URL where you have hosted the application (e.g., `http://yourdomain.com`, `http://localhost/`).
2. If installed correctly, should display, a Select what device this is going to be used on (e.g. Waiting Room TV, Laptop (to control), or Tablet (to control)), and then select the clinic name, and login with the information you set up in the Config file
during this process, make your to check their your Parent companies name is set on the home page, and your clinics name etc.

## Step 8: Troubleshooting

- **If you encounter any PHP errors**: Check the server logs to identify issues. Ensure that all PHP extensions required by your application (e.g., `mysqli`, `mbstring`) are installed.
  
- **If the database connection fails**: Double-check your database credentials in `config.php` and ensure the database server is running.

## Step 9: Maintenance and Updates

- Periodically check for updates in the repository or our website.
- Back up the database regularly to prevent data loss.
- Update PHP, MySQL, and dependencies as necessary to maintain security and performance.

---

This software is Free and Simple to use.

If you require further assistance - Email: [support@pythonastudios.com](mailto:support@pythonastudios.com)  

If you own a Veterinary Practice Manager Software (i.e. Merlin, etc) - Please constact us, to intergrate this with our software: [support@pythonastudios.com](mailto:support@pythonastudios.com)

Whilst this is a free product we, do kindly ask for donations, to help us continue developing, and improving upon this app, and make it better for you.

[donate.pythonastudios.com](donate.pythonastudios.com)
