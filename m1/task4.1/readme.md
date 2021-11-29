# EPAM University Programs
# DevOps education program
## Module 3 Database Administration
## TASK 4.1 
## PART 1

1. Download MySQL server for your OS on VM.
	![Download MySQL server for your OS on VM.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/3ec94dda364a7cdcc47ab25cd643249dcab28aac/m1/task4.1/Screenshot_1.png "Download MySQL server for your OS on VM.")

2. Install MySQL server on VM.
	![Install MySQL server on VM.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/3ec94dda364a7cdcc47ab25cd643249dcab28aac/m1/task4.1/Screenshot_2.png "Install MySQL server on VM.")
	
3. Select a subject area and describe the database schema, (minimum 3 tables)
	![Select a subject area and describe the database schema, minimum 3 tables](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/3ec94dda364a7cdcc47ab25cd643249dcab28aac/m1/task4.1/Screenshot_3.png "Select a subject area and describe the database schema, minimum 3 tables")
	
4. Create a database on the server through the console.
	![Create a database on the server through the console.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/3ec94dda364a7cdcc47ab25cd643249dcab28aac/m1/task4.1/Screenshot_4.png "Create a database on the server through the console.")
	
**mysql>CREATE DATABASE MarchenkoDB**
	
5. Fill in tables.
	![Fill in tables.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/3ec94dda364a7cdcc47ab25cd643249dcab28aac/m1/task4.1/Screenshot_5.png "Fill in tables.")

	**mysql>CREATE TABLE Lecture (Lecture_Id INT, Theme_Lecture VARCHAR(100));**
	
	**mysql>CREATE TABLE Task (Lecture_Id INT, Task_Id INT, Deadline Date);**
		
	**mysql>CREATE TABLE Student (FirstName VARCHAR(20), LastName VARCHAR(20), Task_Id INT, Task_completed Date);**
			
	**mysql>INSERT INTO Lecture VALUES ('1.1','DevOps Introduction');**
	
	**mysql>INSERT INTO Lecture VALUES ('2.1','Virtualization and CloudBasic');**
	
	**mysql>INSERT INTO Lecture VALUES ('3.1','Networks');**
	
	**mysql>INSERT INTO Lecture VALUES ('4.1','DBA');**
	
	**mysql>INSERT INTO Lecture VALUES ('4.1','Linux Essentials');**

	**mysql>INSERT INTO Task VALUES ('1.1','1.1','2021-11-08');**
	
	**mysql>INSERT INTO Task VALUES ('2.1','2.1','2021-11-10');**
	
	**mysql>INSERT INTO Task VALUES ('2.1','2.2','2021-11-15');**
	
	**mysql>INSERT INTO Task VALUES ('3.1','3.1','2021-11-30');**

	**mysql>INSERT INTO Student VALUES ('Olexandr','Marchenko','1.1','2021-11-08');**
	
	**mysql>INSERT INTO Student VALUES ('Vitaly','Krygolam','1.1','2021-11-18');**
	
	**mysql>INSERT INTO Student VALUES ('Nataly','Senko','1.1','2021-11-18');**
	
	
6. Construct and execute SELECT operator with WHERE, GROUP BY and ORDER BY.
	![onstruct and execute SELECT operator with WHERE, GROUP BY and ORDER BY.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/3ec94dda364a7cdcc47ab25cd643249dcab28aac/m1/task4.1/Screenshot_6.png "onstruct and execute SELECT operator with WHERE, GROUP BY and ORDER BY.")
	![onstruct and execute SELECT operator with WHERE, GROUP BY and ORDER BY.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/3ec94dda364a7cdcc47ab25cd643249dcab28aac/m1/task4.1/Screenshot_7.png "onstruct and execute SELECT operator with WHERE, GROUP BY and ORDER BY.")
	![onstruct and execute SELECT operator with WHERE, GROUP BY and ORDER BY.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/3ec94dda364a7cdcc47ab25cd643249dcab28aac/m1/task4.1/Screenshot_8.png "onstruct and execute SELECT operator with WHERE, GROUP BY and ORDER BY.")
	
	**mysql>SELECT * FROM Student WHERE LastName='Marchenko';**
	
	**mysql>SELECT * FROM Lecture WHERE Lecture_Id > 3 ORDER BY Lecture_Id;**

	
7. Execute other different SQL queries DDL, DML, DCL.
	![](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/3ec94dda364a7cdcc47ab25cd643249dcab28aac/m1/task4.1/Screenshot_9.png "Execute other different SQL queries DDL, DML, DCL.")
	
	**mysql>ALTER TABLE Lecture MODIFY Lecture_Id FLOAT NOT NULL;**

	**mysql>UPDATE Lecture SET Lecture_Id = 1.1 WHERE Theme_Lecture = 'DevOps Introduction';**
	
	**mysql>UPDATE Lecture SET Lecture_Id = 2.1 WHERE Theme_Lecture = 'Virtualization and CloudBasic';**
	
	**mysql>UPDATE Lecture SET Lecture_Id = 3.1 WHERE Theme_Lecture = 'Networks';**
	
	**mysql>UPDATE Lecture SET Lecture_Id = 4.1 WHERE Theme_Lecture = 'DBA';**
	
	**mysql>UPDATE Lecture SET Lecture_Id = 4.1 WHERE Theme_Lecture = 'Linux Essentials';**
	
	**mysql>ALTER TABLE Task MODIFY Lecture_Id FLOAT NOT NULL;**
	
	**mysql>ALTER TABLE Task MODIFY Task_Id FLOAT NOT NULL;**

	**mysql>UPDATE Task SET Lecture_Id = 1.1, Task_Id = 1.1 WHERE Deadline = '2021-11-08';**
	
	**mysql>UPDATE Task SET Lecture_Id = 2.1, Task_Id = 2.1 WHERE Deadline = '2021-11-10';**
	
	**mysql>UPDATE Task SET Lecture_Id = 3.1, Task_Id = 3.1 WHERE Deadline = '2021-11-15';**
	
	**mysql>UPDATE Task SET Lecture_Id = 4.1, Task_Id = 4.1 WHERE Deadline = '2021-11-30';**

	**mysql>ALTER TABLE Student MODIFY Task_Id FLOAT NOT NULL;**

	**mysql>UPDATE Student SET Task_Id = 1.1 WHERE LastName = 'Marchenko';**
	
	**mysql>UPDATE Student SET Task_Id = 1.1 WHERE FirstName = 'Vitaly';**
	
	**mysql>UPDATE Student SET Task_Id = 1.1 WHERE FirstName = 'Nataly';**
	
	**mysql>DELETE FROM Student WHERE FirstName = 'Vitaly';**

	
8. Create a database of new users with different privileges. Connect to the database as a new user and verify that the privileges allow or deny certain actions.
	![Create a database of new users with different privileges. Connect to the database as a new user and verify that the privileges allow or deny certain actions.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/3ec94dda364a7cdcc47ab25cd643249dcab28aac/m1/task4.1/Screenshot_10.png "Create a database of new users with different privileges. Connect to the database as a new user and verify that the privileges allow or deny certain actions.")
	
	**mysql>CREATE USER 'TEST'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';**
	
	**mysql>SELECT USER from mysql.user;**
	
	**mysql>CREATE DATABASE testDB;**
	
	**mysql>GRANT ALL PRIVILEGES ON testDB.zvezda TO 'TEST'@'localhost';**
	
	**mysql>GRANT CREATE,SELECT,UPDATE,DELETE ON testDB.zvezda TO 'TEST'@'localhost';**
	
	**mysql>FLUSH PRIVILEGES;**
	
	**mysql>mysql -u TEST testDB -p;**
	
	**mysql>CREATE TABLE Testtables (nomer_Id INT, Kurs FLOAT, Price FLOAT, Tovar VARCHAR(100));**
	
9. Make a selection from the main table DB MySQL.
	![Make a selection from the main table DB MySQL.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/3ec94dda364a7cdcc47ab25cd643249dcab28aac/m1/task4.1/Screenshot_11.png "Make a selection from the main table DB MySQL.")
	![Make a selection from the main table DB MySQL.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/3ec94dda364a7cdcc47ab25cd643249dcab28aac/m1/task4.1/Screenshot_12.png "Make a selection from the main table DB MySQL.")
	![Make a selection from the main table DB MySQL.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/3ec94dda364a7cdcc47ab25cd643249dcab28aac/m1/task4.1/Screenshot_13.png "Make a selection from the main table DB MySQL.")
	![Make a selection from the main table DB MySQL.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/3ec94dda364a7cdcc47ab25cd643249dcab28aac/m1/task4.1/Screenshot_14.png "Make a selection from the main table DB MySQL.")

## PART 2

10. Make backup of your database.
 
	**mysqldump -u MarchenkoDBadmin -p MarchenkoDB > MarchenkoDB-dump.sql;**

11. Delete the table and/or part of the data in the table.
 
	**mysql>DROP TABLE Task;**

12. Restore your database.

	**mysql -u MarchenkoDBadmin -p MarchenkoDB < MarchenkoDB-dump.sql;**

13. Transfer your local database to RDS AWS.
	![Transfer your local database to RDS AWS.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/3ec94dda364a7cdcc47ab25cd643249dcab28aac/m1/task4.1/Screenshot_15.png "Transfer your local database to RDS AWS.")

	**mysql>SELECT user,authentication_string,plugin,host FROM mysql.user;**
	
	**mysql>ALTER USER 'MarchenkoDBadmin'@'localhost' IDENTIFIED WITH caching_sha2_password BY 'password';**
	
	**mysql>ALTER USER 'root'@'localhost' IDENTIFIED WITH caching_sha2_password BY 'password';**
	
	**mysql>FLUSH PRIVILEGES;**
	
	**mysql -u MarchenkoDBadmin -h marchenkodb1.ckmimxnn7b4c.eu-central-1.rds.amazonaws.com -p!**
	
	**mysql -u MarchenkoDBadmin -p -h marchenkodb1.ckmimxnn7b4c.eu-central-1.rds.amazonaws.com MarchenkoRDS < MarchenkoDB-dump.sql**


14. Connect to your database.
	![Connect to your database.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/3ec94dda364a7cdcc47ab25cd643249dcab28aac/m1/task4.1/Screenshot_16.png "Connect to your database.")

15. Execute SELECT operator.
	![Execute SELECT operator.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/b710d78f70e6c79968f43c819721ee05b25bfe32/m1/task4.1/Screenshot_17.png "Execute SELECT operator.")

16. Create the dump of your database.
	![Create the dump of your database.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/3ec94dda364a7cdcc47ab25cd643249dcab28aac/m1/task4.1/Screenshot_18.png "Create the dump of your database.")

	**mysqldump -u MarchenkoDBadmin -h marchenkodb1.ckmimxnn7b4c.eu-central-1.rds.amazonaws.com -p MarchenkoRDS > MarchenkoRDS.sql;**

## PART 3

17. Create an Amazon DynamoDB table
	![Create an Amazon DynamoDB table](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/3ec94dda364a7cdcc47ab25cd643249dcab28aac/m1/task4.1/Screenshot_19.png "Create an Amazon DynamoDB table")

18. Enter data into an Amazon DynamoDB table.
	![Enter data into an Amazon DynamoDB table.](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/3ec94dda364a7cdcc47ab25cd643249dcab28aac/m1/task4.1/Screenshot_20.png "Enter data into an Amazon DynamoDB table.")

19. Query an Amazon DynamoDB table using Query and Scan
	![Query an Amazon DynamoDB table using Query and Scan](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/3ec94dda364a7cdcc47ab25cd643249dcab28aac/m1/task4.1/Screenshot_21.png "Query an Amazon DynamoDB table using Query and Scan")
	![Query an Amazon DynamoDB table using Query and Scan](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/3ec94dda364a7cdcc47ab25cd643249dcab28aac/m1/task4.1/Screenshot_22.png "Query an Amazon DynamoDB table using Query and Scan")
	![Query an Amazon DynamoDB table using Query and Scan](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/3ec94dda364a7cdcc47ab25cd643249dcab28aac/m1/task4.1/Screenshot_23.png "Query an Amazon DynamoDB table using Query and Scan")
	![Query an Amazon DynamoDB table using Query and Scan](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/3ec94dda364a7cdcc47ab25cd643249dcab28aac/m1/task4.1/Screenshot_24.png "Query an Amazon DynamoDB table using Query and Scan")
