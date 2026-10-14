# Furni – Furniture E-commerce Platform

Furni is a furniture e-commerce web application that allows customers to browse furniture products, manage their shopping carts, apply discount coupons, and complete the checkout process, while providing an admin dashboard for managing the store's content and resources.

## Features

### Customer Storefront
- Browse furniture products and explore the shop.
- View product details and related information.
- Add products to the shopping cart and update quantities dynamically.
- Validate product quantities against available stock.
- Apply and remove discount coupons.
- Calculate cart subtotal, discounts, and final total.
- Complete checkout with billing, shipping, and order notes.
- Manage customer profiles and view order-related information.

### Admin Dashboard
- Manage products, categories, and services.
- Create, update, view, and delete blog posts.
- Manage users, roles, and permissions.
- Manage team members and testimonials.
- View and update company settings, including logos, favicons, and social media links.
- Control access to administrative features using authorization policies and permissions.

### RESTful API
- Authentication using Laravel Sanctum.
- API endpoints for users, posts, products, roles, services, testimonials, and team members.
- Request validation using Laravel Form Requests.
- Consistent JSON responses using API Resources.
- Image upload and management.
- Role and permission management using Spatie Laravel Permission.

## Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP, Laravel |
| Frontend | Blade, JavaScript, Alpine.js |
| Styling | Bootstrap, custom CSS |
| Build Tool | Vite |
| Database | MySQL |
| Authentication | Laravel Authentication, Laravel Sanctum |
| Authorization | Laravel Gates, Spatie Laravel Permission |
| API | RESTful API, JSON, Laravel API Resources |
| File Storage | Laravel Filesystem |
| Notifications | SweetAlert2 / application notifications |

## Requirements

- PHP version compatible with your Laravel project.
- Composer
- Node.js and npm
- MySQL
- Git

## Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/Esraa-Mahmoud-Mohamed/furni.git
cd furni
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Configure the Environment

Create your environment file:

```bash
cp .env.example .env
php artisan key:generate
```

Configure your database in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=furni
DB_USERNAME=root
DB_PASSWORD=
```

Update the database name, username, and password to match your local environment.

### 4. Run Database Migrations

```bash
php artisan migrate
```

To populate the database with sample data, if seeders are configured:

```bash
php artisan db:seed
```

### 5. Configure File Storage

Create the public storage symbolic link:

```bash
php artisan storage:link
```

### 6. Start the Application

Run the Laravel development server:

```bash
php artisan serve
```

In another terminal, start Vite:

```bash
npm run dev
```

The application will be available at:

```text
http://localhost:8000
```

## API Overview

The API uses the `/api/v1` prefix.

| Method | Endpoint | Description |
|---|---|---|
| POST | `/api/v1/register` | Register a user |
| POST | `/api/v1/login` | Authenticate a user |
| POST | `/api/v1/logout` | Log out an authenticated user |
| GET | `/api/v1/posts` | Retrieve posts |
| GET | `/api/v1/products` | Retrieve products |
| GET | `/api/v1/services` | Retrieve services |
| GET | `/api/v1/team-members` | Retrieve team members |
| GET | `/api/v1/testimonials` | Retrieve testimonials |
| GET | `/api/v1/users` | Retrieve users |
| GET | `/api/v1/roles` | Retrieve roles |

The resource endpoints are protected by Sanctum authentication in the current route configuration. Send a valid bearer token when accessing protected endpoints.

For example:

```http
Authorization: Bearer YOUR_ACCESS_TOKEN
Accept: application/json
```

The API also supports resource-specific operations such as creating, updating, and deleting records according to the configured routes and authorization rules.

## Project Structure

```text
app/
├── Http/
│   ├── Controllers/
│   │   ├── Api/
│   │   └── EndUser/
│   ├── Requests/
│   └── Resources/
├── Models/
├── Policies/
├── Services/
└── Traits/

database/
├── factories/
├── migrations/
└── seeders/

resources/
├── views/
├── css/
└── js/

routes/
├── web.php
├── api.php
└── auth.php

tests/
```

## Development

Run the automated test suite:

```bash
php artisan test
```

Build frontend assets for production:

```bash
npm run build
```

Before deploying, configure production environment variables, use secure credentials, and review Laravel's production deployment recommendations.

## License

Add the applicable license for this project. If you choose the MIT License, include the corresponding `LICENSE` file in the repository.
