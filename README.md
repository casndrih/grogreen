# Grogreen: Laravel and Tailwind CSS Small Multi-Vendor Ecommerce Project

![Grogreen Logo](logo.svg)

Grogreen is a small multi-vendor ecommerce platform built using Laravel and Tailwind CSS. It aims to provide a platform for local Micro, Small, and Medium Enterprises (MSMEs) to showcase and sell their products online.

## Project Overview

Grogreen is a project that was developed during the 2023 Apec App Challenge held in the USA. It is an ongoing project that is continuously being improved and enhanced to meet the needs of local businesses and consumers.

## Features

- User Registration and Authentication: Users can create accounts and log in to the platform.
- Vendor Management: MSMEs can register as vendors and manage their products, inventory, and orders.
- Product Catalog: Vendors can create and manage product listings, including images, descriptions, and pricing.
- Shopping Cart: Customers can add products to their cart and proceed to checkout.
- Order Management: Vendors can track and manage customer orders, update order status, and generate invoices.
- Payment Integration: Integration with popular payment gateways to facilitate secure and convenient online transactions.
- Search and Filtering: Customers can search for products and apply filters to find specific items.
- Responsive Design: The platform is designed to be responsive and accessible across different devices.

## Installation and Setup

1. Clone the repository:
   ```
   git clone https://github.com/casndrih/grogreen.git
   ```

2. Install project dependencies:
   ```
   cd grogreen
   composer install
   npm install
   ```

3. Configure the database:
   - Rename the `.env.example` file to `.env`.
   - Update the database credentials in the `.env` file.

4. Generate the application key:
   ```
   php artisan key:generate
   ```

5. Run database migrations:
   ```
   php artisan migrate
   ```

6. Start the development server:
   ```
   php artisan serve
   ```

7. Access the application in your browser at `http://localhost:8000`.

## Contributing

If you are interested in contributing to the Grogreen project, feel free to submit pull requests or open issues on the [GitHub repository](https://github.com/casndrih/grogreen). Your contributions are highly appreciated!

---

Note: Grogreen is an ongoing project, and further developments and improvements are underway.# grogreen
