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
The main part of the website is PHP, located in ``` site/pages ```.

Queres, requests and page generation is made using php. User and Connection are 2 main classes in the rpoject, first one is just simply logging user in and out. Second one is made for executing queres and recieving data from the database. 

Files addCourseaction.php, addStudentaction.php, deleteStudent.php, editGrades.php, editStudents.php are modifying the database.

Other php files are html templates pages, with php, that generates working page, based on data from the database.

HTML files are pages, that only send the data.

Javascript files are used for generating charts, and few non crutial features.

CSS file in ``` site/static ``` for better website appearance.

``` site/sql_scripts ``` is the folder that contains the sql queres templates.
 
