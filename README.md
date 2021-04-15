<h3>Assigned Project Document</h3>

<h5>Project Environment Setup Process</h5>
1.	Download and Exact project from github, 
Github URL : https://github.com/prauni/eventsauce
2.	Setup Env file for Database credentials
3.	Run command: 
a)	composer update
Setup project enviroment
b)	php artisan migrate
From command prompt to create database table 
4.	Run command: php artisan serve
To run development server


<h5>Project API Listing</h5>
1. Employee Add using API
API Url : http://localhost:8000/api/employee
Method : POST
Params : 
•	Dept_id
•	First_name
•	Last_name
 
<h5>2. Employee Listing using API</h5>
API Url : http://localhost:8000/api/employee
Method : POST
 

<h5>3. Employee Transfer using API</h5>
API Url : http://localhost:8000/api/employee/transfer
Method : POST
Params : 
•	Emp_id
•	Dept_id

 
<h5>4.  Employee Transfer Log History</h5>
API Url : http://localhost:8000/api/employee/transfer_log
Method : GET


<h5>5.  Employee Transfer Log History of Employee X</h5>
API Url : http://localhost:8000/api/employee/transfer_log/{employee_id}
Method : GET

<h5>6. Employee Soft Delete from database.</h5>
API Url : http://localhost:8000/api/employee/delete/1
Method : Delete

 

