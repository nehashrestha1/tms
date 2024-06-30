
MYSQL: DBMS -> database Management system

SQL: Structure Query Language

Types of SQL:

DDL:

DML:

TCL:

DQL: 


CREATE:
CREATE DATABASE DATABASE_NAME;

CREATE TABLE TABLE_NAME (
    ID INT AUTO_INCREMENT PRIMAY KEY,
    NAME VARCHAR (50) NOT_NULL,

)
---------------------------------------------------------------
INSERT:
INSERT INTO TABLE_NAME (FIELD_NAME1, FIELD_NAME2,....)
VALUES ('$VALUE1', '$VALUE2', .....);


UPDATE:
UPDATE TABLE_NAME SET FIELD1='$VALUE1', FIELD2='$VALIE2', .... CONDITION(WHERE);

e.g.
UPDATE `users` SET `name`='Ram',`username`='Ram123',`email`='Ram@gmail.com',`password`='fsfsdfsdfsdf' WHERE id=2

DELETE:
DELETE FROM TABLE_NAME CONDITION;

SELECT:
SELECT *FROM TABLE_NAME;
SELECT FIELD1, FIELD2 FROM TABLE_NAME;
SELECT FIELD1, FIELD2 FROM TABLE_NAME CONDITION;

DROP: (DELETE DATABASE OR TABLE )
DROP DATABASE DATABASE_NAME;
DROP TABLE TABLE_NAME


ALTER: (ADD OR DELETE COLUMN AND UPDATE THE COLUMN NAME)

ALTER TABLE table_name
ADD column_name datatype;

ALTER TABLE table_name
DROP COLUMN column_name;

ALTER TABLE table_name
RENAME COLUMN old_name to new_name;
-------------------------------------------------------------------


php : HyperText Preprocessor
    : Server side scripting PL

    Syntax:

    <?php
    
    //code 
     ?>

To create variable using PHP
user define variable

$variable= Value;
e.g.
$x=10;


To Print using php

echo "message";  ✔
print("Message");

Methods:
POST    : Insert Data into Database
GET     : Fetch Data from the database
PUT     : Edit the data
DELETE  : To Delete data


Pre-defined Functions:
mysqli();               : Connect to PHP and MYSQL
mysqli_connect();       : ,,
mysqli_query();         : Connect to conenct query and Queries 
mysqli_fetch_assoc()    : To fetch signle row data from the database
mysqli_fetch_array()    : To fetch all data from the database
session_start();        : start the session for cookies
session_destory();      : destory(Clear) all the cookies stored data
mysqli_num_rows();      : Read each row data


Golbal Variables:

$_POST['string'];
$_GET['string'];
$_SESSION['string'];


Database: 
Database Name: tms
tables:
1. users
id | name | username | email | password | status | created_at | updated_at

2. tasks
   id | title | description| start_date | end_date | status | created_at | updated_at

3. courses
   id | c_name | description | price | duration  | status | created_at | updated_at



