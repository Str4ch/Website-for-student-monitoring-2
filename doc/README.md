## Before start

1. Install xampp.
2. Start apache server and database.
3. Go to ``` http://localhost/phpmyadmin/ ```
4. Set up the database named ```StudentMonitoringSystem```
5. Add table users
```
CREATE TABLE users (
username VARCHAR(255),
password VARCHAR(500)
);
INSERT into users values ('SA', "123");
```

## How to start
    
1. Put the project folder in 
``` 
xampp/htdocs
``` 
2. Start the server.
 
3. To visit the website, go to the following link

``` 
http://localhost/Website-for-student-monitoring-2-main/site/pages/
```
4. Ener username "SA", password "123"
## How it works
The core of the website is built using PHP, with the main code located in the ```site/pages``` directory.

Queries, requests, and page generation are handled by PHP. Two key classes in the project are User and Connection. The User class manages user login and logout functionality, while the Connection class is responsible for executing queries and retrieving data from the database.

Several PHP files, such as addCourseAction.php, addStudentAction.php, deleteStudent.php, editGrades.php, and editStudents.php, modify the database.

Other PHP files serve as HTML templates, incorporating PHP to generate dynamic web pages based on database content.

The HTML files are static pages that primarily handle data submission.

JavaScript files are used to generate charts and implement a few non-essential features, while the CSS file, located in ```site/static```, enhances the visual appearance of the website.

Finally, the ```site/sql_scripts``` folder contains SQL query templates.

 
