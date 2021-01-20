# simple-chat

## Installation Instructions
1- You need to have a local web server as a host (e.g. [XAMPP](https://www.apachefriends.org/download.html), [MAMP](https://www.mamp.info/en/downloads/) )
FOLLOW THIS [LINK](https://www.youtube.com/watch?v=0P6DEUJaVTc&t=4s) TO DOWNLOAD MAMP PROPERLY 

2- Download this files in the repo(zip folder) and extract them in a file called (htdocs) in MAMP folder in C drive on WINDOWS OS.

3- Open the server of the MAMP and open phpmyadmin in the local host, then write this SQL query in SQL tab in phpMyAdmin to make a database connection correctly to our file

CREATE DATABASE accs;
GRANT ALL ON accs.* TO 'salma'@'localhost' IDENTIFIED BY 'zip';
GRANT ALL ON accs.* TO 'salma'@'127.0.0.1' IDENTIFIED BY 'zip';

4-import the database uploaded in the repo inside this database which you created.
