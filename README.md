# Flommerce

Flommerce is a Simple e-commerce application which demonstrates my ability with Laravel. Any bugs or issues please email me at developer[at]paulchater.co.uk.

Features:
	- User Authentication
	- Categories
	- Products
	- Checkout
    - Stripe Payment Processing
    - Order Confirmation via Email

![ScreenShot](https://raw.githubusercontent.com/pchater/flommerce.dev/master/public/img/stripe-payment-success-scrot.png)

How to Set Up:
---
Firstly this will *NOT* work without the following types of accounts:
    1. Stripe Test Account (http://dashboard.stripe.com/register)
    2. MailTrap.io Account (You can use SMTP but configure in the .env file)

Set up the Database (MySQL) via your correct settings For example we recommend
Database of Flommerce, User of Flommerce and a NULL password for testing purposes.

Run the command: php artisan migrate followed by php artisan db:seed

This will install a test user and get you going quickly. The username and password for test user are as follows:
    *Username*: test@test.com
    *Password*: test123
    
Set Your Secret Key for Stripe in Flommerce\App\Http\Controllers\CartsController - line 65 (This will be prepended by sk_***************)
Publishable Key in Flommerce\public\js\checkout.js (this is prepended by pk_).

You must also configure some form of SMTP server such as MailTrap so that it can send mails. Mailtrap simply just catches emails without sending them to a real server.
