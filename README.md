<h3>Assigned Project Document</h3>

<h5>Project Environment Setup Process</h5>
<p>1.	Download and Exact project from github, </p>
<p>Github URL : https://github.com/prauni/eventsauce</p>
<p>2.	Setup Env file for Database credentials</p>
<p>
3.	Run command: </p>
<ul><li><p>a)	composer update</p>
<p>
Setup project enviroment</p>
</li><li>
<p>
b)	php artisan migrate</p>
<p>
From command prompt to create database table </p>

</li></ul>
<p>4.	Run command: php artisan serve</p>
<p>
To run development server</p>
<p></p>



<h5>Project API Listing</h5>

<p>1. Employee Add using API</p>
<p>
API Url : http://localhost:8000/api/employee</p>
<p>
Method : POST</p>
<p>
Params : </p>
<ul><li>Dept_id</li><li>First_name</li><li>Last_name</li></ul>
<p>
 
<h5>2. Employee Listing using API</h5>
<p>API Url : http://localhost:8000/api/employee</p>
<p>
Method : GET</p>
<p></p>


<h5>3. Employee Transfer using API</h5>
<p>API Url : http://localhost:8000/api/employee/transfer</p>
<p>
Method : POST</p>
<p>
Params : </p>
<ul><li>Emp_id</li><li>Dept_id</li></ul>

<p></p>
 
<h5>4.  Employee Transfer Log History</h5>
<p>API Url : http://localhost:8000/api/employee/transfer_log</p>
<p>
Method : GET</p>
<p></p>



<h5>5.  Employee Transfer Log History of Employee X</h5>
<p>API Url : http://localhost:8000/api/employee/transfer_log/{employee_id}</p>
<p>
Method : GET</p>
<p></p>


<h5>6. Employee Soft Delete from database.</h5>
<p>API Url : http://localhost:8000/api/employee/delete/1</p>
<p>
Method : Delete</p>

 

