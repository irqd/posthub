# PostHub - Simple CRUD Project with Laravel and Livewire

## 1. About the Project

PostHub is a simple CRUD (Create, Read, Update, Delete) project built with Laravel and Livewire. The project is designed to allow users to create and manage posts, making it easy for users to share their thoughts and engage with others.

### Key Features

- **Authentication:** PostHub provides a complete authentication system, including user registration, login, and password reset functionality.

- **Customizable Profiles:** Users can customize their profiles, making it a personal space for them to share and connect with others.

- **Posting Thoughts (Posts):** The main feature of PostHub allows users to create, view, update, and delete their posts. Users can share their thoughts, stories, or any content they wish with the community.

## 2. Technologies Used

PostHub is built using the following technologies:

- **Laravel:** Laravel is a popular PHP framework that provides an elegant syntax and tools for building web applications.

- **Livewire:** Livewire is a full-stack framework for Laravel that simplifies building dynamic interfaces using the power of Laravel and the convenience of Livewire components.

## 3. How to Set Up the Project

To set up the PostHub project, follow these steps:

1. **Clone the Repository:** Start by cloning the project repository from GitHub using the following command:

   ```shell
   git clone https://github.com/irqd/posthub.git

2. **Navigate to the Project Directory:** Change your working directory to the project folder:

   ```shell
   cd posthub

3. **Install Dependencies:** Install Dependencies:

   ```shell
   composer install

4. **Copy the Environment File:** Make a copy of the example environment file and configure it with your database settings:

   ```shell
   cp .env.example .env

5. **Generate Application Key:** Generate Application Key:

   ```shell
   php artisan key:generate

6. **Database Setup:** Create a new database for your project and update the database connection   information in your .env file.

7. **Run Database Migrations:** Migrate your database to create the required tables:

   ```shell
   php artisan migrate

8. **Start the Development Server:** Run the development server to verify everything is working:

   ```shell
   php artisan serve

9. **Run npm for development:** Run npm for development:

   ```shell
   npm run dev

10. **Visit the Application:** Visit the application at http://localhost:8000


## 4. Key Notes

- The application core features are working as is, but there are still some features that need to be implemented. If you have any ideas, feel free to play around with the code and implement them. Maybe add some authorization to the application, or add some tests. The possibilities are endless.
  