<img src="./assets/Seulement_Ventilateur_-_transparent.png" />
A completely original and innovative social media !

<h2 style="color: #45AFFF">Install and setup</h2>
To become a VentiloFan, you will need to setup your local environement.
And, to do so, you will need to setup a database and host locally your own version of Seulement Ventilateurs.

<img src="https://warlord0blog.files.wordpress.com/2019/09/laragon_logo1.png" width="200" />

For the database management, we recommand using [Laragon](https://laragon.org/) as we used it to build this project.

<h3 style="color: #45AFFF">Setting up Laragon</h3>
(TUTO LARAGON)

<img src="https://cdn-images-1.medium.com/fit/t/1600/480/1*oLFo5u_zyBkuS8WpSoXBIQ.png" width="200" />

In order to host the site locally, we recommand using [PhpStorm](https://www.jetbrains.com/phpstorm/) as we also used
this IDE to program the all the code available on this repository. You will then be able to do your own modifications
on the site and inspect what we did and how.

<h3 style="color: #45AFFF">Setting up PhpStorm</h3>
(TUTO PHPSTORM)
(BIEN PRECISER QU'ON A UN SCRIPT SQL POUR LES TABLES)


<h2 style="color: #45AFFF">Features</h2>
Seulement Ventilateurs is a social media where you can share content related to ventilators and interact with other
VentiloFans.

<h3 style="color: #45AFFF">Account system</h3>
To enter the wonderful world of Seulement Ventilateurs, you will need to create an account. All accounts are stored in
the database with an unique username for each one of them. After the creation of your account, you will be able to
edit your informations such as username, password or profile picture.

<h3 style="color: #45AFFF">Security</h3>
In order for every VentiloFan to cultivate their passion in complete quietude, we made sure that all the accounts are
safe. The passwords of each members are safely registered to the database after being hashed with the Blowfish algorithm
and being salted. Doing so, we made sure no malicious person can take access of your accounts and your informations.

<h3 style="color: #45AFFF">Session management</h3>
For your experience to be the best and to avoid having to reconnect each time you come and visit the site, we elaborated
a session system that allow you to be redirected directly to the home page of the site if you have been connected
before. You will be logged as the last user you logged in as. Of course you can always choose to end your session by
disconnecting. Also, we made sure that a logged in user cannot access the login page and that a logged out user cannot
access the home page.

<h3 style="color: #45AFFF">Ventilate</h3>
The main part of the website is to share your pictures and comments about ventilators. When you arrive at the home page,
you will be able to see all the posts that were made by the precedent users and the comment they put with. Each user
has the possibility to delete his own content and the admin session can delete every content that does not suit our
platform behavior rules.

<h3 style="color: #45AFFF">Error Handling</h3>
To diminish users frustration, we made sure all the errors that can occur during the use of our website are correctly
explained and shown. That way, the user can make sure he does not repeat the same mistakes and that he can fix his own
issues.