<img src="https://i.imgur.com/MwHqpd5.png" />
<p style="text-align: center">
    A completely original and innovative social media !
</p>

<h2 style="color: #45AFFF">Install and setup</h2>
<p style="text-align: justify">
    To become a VentiloFan, you will need to setup your local environement.
    And, to do so, you will need to setup a database and host locally your own version of Seulement Ventilateurs.
    ⚠ Note that if you can use your solution for local database server and php interpreter
</p>


<img src="https://warlord0blog.files.wordpress.com/2019/09/laragon_logo1.png" width="200" />
<p style="text-align: justify">
    For the database management, we recommand using
    <a href="https://laragon.org/">Laragon</a> as we used it to build this project.
</p>



<img src="https://cdn-images-1.medium.com/fit/t/1600/480/1*oLFo5u_zyBkuS8WpSoXBIQ.png" width="200" />
<p style="text-align: justify">
    In order to host the site locally, we recommand using
    <a href="https://www.jetbrains.com/phpstorm/">PhpStorm</a> as we also used this IDE to program the all the code
    available on this repository. You will then be able to do your own modifications on the site and inspect what we
    did and how.
</p>



<h3 style="color: #45AFFF">Setting up PhpStorm and Laragon</h3>
We won't make a tutorial on how to setup up PhpStorm and Laragon, but you can find our sources here :

> [French tutorial made by a Paris Descartes alumni, Arsène Lapostolet](https://knowledge.arsenelapostolet.fr/books/d%C3%A9veloppement-web-en-php/page/mettre-en-place-un-environnement-de-d%C3%A9veloppement-php-mysql)

<h3 style="color: #45AFFF">Requirement</h3>
1. The database must be named : "SeulementVentilateurs" <br>
2. The database password must be : "OnlyFans" <br>
3. It's by default but please make sure you're using the port : "3306" <br>
4. the user is : "root"

<h4 style="color: #45AFFF">Finally</h4>

In a query console, create table using the sql script in the projet. First **fans table** then **content table**, and you ready to go.

<h3 style="color: #45AFFF">Disclaimer</h3>

<p style="text-align: justify">
    Don't use Firefox browser or be ready to setup the necessary configurations for it to read localhost urls.
</p>

<h2 style="color: #45AFFF">Features</h2>
<p style="text-align: justify">
    Seulement Ventilateurs is a social media where you can share content related to ventilators and interact with other
    VentiloFans.
</p>


<h3 style="color: #45AFFF">Account system</h3>
<p style="text-align: justify">
    To enter the wonderful world of Seulement Ventilateurs, you will need to create an account. All accounts are stored
    in the database with an unique username for each one of them. After the creation of your account, you will be able
    to edit your informations such as username, password or profile picture.
</p>



<h3 style="color: #45AFFF">Security</h3>
<p style="text-align: justify">
    In order for every VentiloFan to cultivate their passion in complete quietude, we made sure that all the accounts
    are safe. The passwords of each members are safely registered to the database after being hashed with the Blowfish
    algorithm and being salted. Doing so, we made sure no malicious person can take access of your accounts and your
    informations.
</p>



<h3 style="color: #45AFFF">Session management</h3>
<p style="text-align: justify">
    For your experience to be the best and to avoid having to reconnect each time you come and visit the site, we
    elaborated a session system that allow you to be redirected directly to the home page of the site if you have been
    connected before. You will be logged as the last user you logged in as. Of course you can always choose to end your
    session by disconnecting. Also, we made sure that a logged in user cannot access the login page and that a logged
    out user cannot access the home page.
</p>


<h3 style="color: #45AFFF">Front-end</h3>
<p style="text-align: justify">
    Ok ... we were very "inspired" by twitter on this one, notice that the web-site is responsive and mobile ready
</p>

<h3 style="color: #45AFFF">Profil editor</h3>
<p style="text-align: justify">
    As every human being, we all want to be unique. You will be able to edit your account credentials and profil picture in the profil editor section.
    (you can update 1 at the time
</p>


<h3 style="color: #45AFFF">Error Handling</h3>
<p style="text-align: justify">
    To diminish users frustration, we made sure all the errors that can occur during the use of our website are
    correctly explained and shown. That way, the user can make sure he does not repeat the same mistakes and that he can fix
    his own issues.
</p>

<h2 style="color: #45AFFF">Testing Walktrough</h2>
<p style="text-align: justify">
    This chapter will guide you in our website.
</p>


<h3 style="color: #45AFFF">Starting</h3>
<p style="text-align: justify">
    1. Start by typing in the search tab : localhost/public/index.php <br>
    2. Click on "inscription" to make the first account, name it "admin" as it grant the account the power to delete all the content. <br>
    3. You're now on : http://localhost/public/index.php?controller=home <br>
    4. You can start testing on your own by updating your account on the "profile" section (username, password and profile picture). <br>
    5. Add your own content on the "ventiler" section (must have a least a text or a image file) <br>
    6. Log out on the left down section "Deconnection" <br>
    7. Create another user account. <br>
    8. Notice that you can't delete the content uploaded by your first account. <br>
    9. Test the same way as the first time (try breaking it by having two admin users or by uploading wrong format file). <br>
    10. Play with the urls by changing the controller (see Controllers directory in the source code).
    11. Log out and test the login "Connectez vous" by using the account credentials you made previously. (you still can try to break the site by using non-existent account).
    12. And you should be done testing our website, you can now take a look at the source code.
</p>

