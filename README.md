## Setup

### Prerequisites

- PHP (version)
- Composer
- Node.js & NPM

### Installation

1. Clone the repository: git clone git@github.com:hauzenberge/tz_from_Brazy.git
2. Install PHP dependencies: composer install
3. Install and Build Node.js dependencies: npm install && npm run build
4. Copy the `.env.example` file to a new file named `.env`: cp .env.example .env
5. Generate the application key: php artisan key:generate
6. Open the `.env` file and set the database connection details.
7. Register on [Pixabay](https://pixabay.com/api/docs/) to get an API key. Add the key to the `.env` file: IXABAY_KEY=your_pixabay_api_key

### Database Setup

1. Run database migrations: php artisan migrate
2. Seed the database with initial data: php artisan db:seed

### Usage

Describe how to use/run the project.

### Additional Notes

- The `PIXABAY_KEY` in the `.env` file is crucial for seeding news and enabling their editing features.
- Make sure the key is properly set up for the full functionality of the application.
