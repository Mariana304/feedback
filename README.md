Ticket Feedback System

A Laravel web app that lets customers rate the support they received on a ticket and leave comments, through a secure one-time link.

After a support ticket is closed, the customer receives a personal link. Opening it shows a short form where they rate the service and add an optional comment. Support staff can then review all the ratings in a searchable table.

Features
Secure links: each link carries an encrypted token (Laravel Crypt) with the ticket data, so it can't be read or edited by hand.
One rating per ticket: if a ticket was already rated, the link shows a clear message instead of the form.
Expiring links: links stop working 60 days after the ticket date.
Pre-selected rating: the customer can confirm or change the rating that came in the link, and add comments.
Error handling: invalid or tampered tokens show a friendly error page instead of crashing.
Results table: a page lists all feedback with search, sorting and export using DataTables.
Tech stack
PHP 8.1 · Laravel 10
MySQL
Blade templates · Tailwind CSS · Vite
DataTables
How it works
The ticketing system generates a link like https://your-domain/{token}.
The app encrypts the token and redirects to /feedback/{encryptedToken}.
FeedbackController@index decrypts the token, extracts the ticket number, ticket ID, rating, status and date, and checks that the ticket hasn't been rated and the link hasn't expired.
The customer submits the form; FeedbackController@store saves the rating, comments and the customer's IP address.
The customer sees a thank-you page.
Main routes
Method	Route	Description
GET	/{token}	Entry point from the ticket link
GET	/feedback/{token}	Shows the feedback form
POST	/feedback	Saves the feedback
GET	/gracias	Thank-you page
GET	/Consulta	Table with all feedback
Installation
bash
git clone https://github.com/Mariana304/feedback.git
cd feedback
composer install
npm install
cp .env.example .env
php artisan key:generate

Set your database credentials in .env, then run:

bash
php artisan migrate
npm run build
php artisan serve
