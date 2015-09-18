# msgBoard

````
Simple message Board project to demonstrate MVC concepts using plain PHP

This msgBoard project was written as an exercise in implementing the MVC design
pattern in plain PHP. I wrote it using ideas/techniques from various online
tutorials (principally the phpacademy Youtube channel) and Treehouse courses
(specifically the PHP course and the Ember.js course, Ember being a client-side
MVC framework written in javascript).

NOTE: This was done as an exercise and as such does not have all the error
      checking and defensive programming routines needed for a production
      system. Also, a lot of the routines may seem redundant but I wrote them
      thinking about future enhancements.

The files in the project are:

-.htaccess - Rewrite rules for redirecting all requests through a single file
-msgBoard.sql - exported SQL tables for the msgBoard database.
-index.php - starting point of msgBoad. Parses the query string received from
             the webserver following the .htaccess rules
\class
    - App.php - class that uses passed argument to create appropriate
                controller object
    -ControllerFactory - singleton class that maintains routing tables and
                         supplies a controller object based on input
    -Controller.php - abstract base class for all controllers. Provides a 
                      few implemented methods.
    -MainController.php - concrete class that manages the initial page for 
                      msBoard.
    -MessageController.php - concrete class that manages the message display
                      page for msBoard.
    -AddMessageController.php - concrete class that manages the add message
                      page for msBoard.
    -AddCommentController.php - concrete class that manages the add comment
                      page for msBoard.
    -ResponseController.php - concrete class that manages the feedback page for 
                      msBoard.
    -UnknownController.php - concrete class that manages the page that reports
                      unknown URL requests for msBoard.
    -View.php - abstract base class for all views. Provides a few implemented 
                      methods.
    -MainView.php - concrete class for updating/displaying the main page.
    -MessageView.php - concrete class for updating/displaying the message
                      display page.
    -AddMessageView.php - concrete class for updating/displaying the add
                      message page.
    -AddCommentView.php - concrete class for updating/displaying the add
                      comment page.
    -ResponseView.php - concrete class for updating/displaying the user feedback
                      page.
    -UnknownView.php - concrete class for updating/displaying the unknown URL
                      page.
    -Model.php - concrete class for accessing the database.
                      page.
\lib
    -config.php - PHP constants for accessing the database and settting up
                      file paths and URLs.
\template
    -MainView.html - HTML template file for displaying Main Page
    -MessageView.html - HTML template file for displaying the message Page
    -AddMessageView.html - HTML template file for displaying Add Message
                      Form Page
    -AddCommentView.html - HTML template file for displaying Add Comment
                      Form Page
    -UnKnownView.html - HTML template file for displaying Unknown URl
                      message page.
    -ResponseView.html - HTML template file for displaying User feedback
                      page.
\css
    -style.css - very basic styling for the msgBoard pages


