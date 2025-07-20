# WeeNorth App

A Laravel web application designed for the WeeNorth network to manage membership and connect tradeswomen. The platform provides comprehensive tools including member management, real-time chat, CV builder, and job board functionality.

## Features

- **Membership Management** - Comprehensive member registration and profile management
- **Real-time Chat** - Connect and communicate with other tradeswomen in the network
- **CV Builder** - Professional resume builder tailored for trades professionals
- **Job Board** - Post and browse job opportunities within the network
- **User Profiles** - Detailed profiles showcasing skills and experience

## Installation

1. Clone the repository
```bash
git clone <repository-url>
cd weenorth-app
```

2. Install dependencies
```bash
composer install
npm install
```

3. Set up environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure database in `.env` file and run migrations
```bash
php artisan migrate
```

5. Start the development server
```bash
php artisan serve
```

## Requirements

- PHP >= 8.1
- Composer
- Node.js & npm
- MySQL/PostgreSQL

## Usage

Visit `http://localhost:8000` to access the application and begin managing your WeeNorth network membership.

## Contributing

1. Fork the repository
2. Create a feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).