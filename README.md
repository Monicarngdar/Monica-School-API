# Monica-School-API
API Systems 

## Project Overview
This project is a RESTful API developed in PHP-based backend system designed to manage student data for the learning management system. The API allows secure retrieval and updates of student information, while ensuring only authorised actions are allowed. It interacts with a MySQL database `2026-schoolapi` and is structured to be modular and maintainable.

The API allows retrieval and management of student-related data such as attendance, grades, class, assignments, units, timetable and events. It can be tested using tools such as Postman and is structured to simulate backend development.

## Purpose and Aims
The main purpose of this project is to demonstrate understanding of:
- RESTful API design principles
- Handling HTTP methods (GET, POST, PUT, PATCH, DELETE)
- Secure data handling and validation

The API is designed to:
- Provide access to student data
- Allow interaction with system resources through endpoints
- Ensure only authorised access to sensitive data

## Setup 
1. Install XAMPP and start Apache and MySQL.
2. Import the `2026-schoolapi` database into phpMyAdmin.
3. Place the project folder inside the `htdocs` directory.
4. Access the API using:
   http://localhost:8080/Monica-School-API/
5. Import the provided Postman collections to test the API endpoints.


## Project Structure
- **api/** – This folder handles all the API endpoints. Inside this folder, there are subfolders for each type of resource.  
Examples:
  - /api/grades/ → Retrieve student grades 
  -	/api/attendance/ → Retrieve attendance records 
  -	/api/user/ → Handle user-related actions     

- **core/** – This folder contains the core logic of the API, such as classes that define how the application works. For example,
   -   `user.php` has the `User` class that handles reading and updating user data.

- **includes-api/** – This folder contains files that help the API function properly:   
    - `config.php` – Sets up the database connection using PDO.   
    - `initialize.php` – Loads required classes and configuration so the endpoints can use them.

## Security Considerations
The API includes several security practices:
-	PDO prepared statements used to prevent SQL injection
- Input sanitised using htmlspecialchars() 
- Restricted access to endpoints using authentication checks
-	Protection against unauthorised access.
-	Structured handling of requests to avoid common vulnerabilities.

## Testing
The API can be tested using Postman by sending HTTP requests to the available endpoints.
-	A collection is created in Postman to group all endpoints related to a specific resource. 
-	For example, a User Collection is used to handle all user-related endpoints.

### **Example: Get Users**
-	To retrieve all users, a GET request is sent to the following endpoint:
-	http://localhost:8080/Monica-School-API/api/user/read.php 

This URL follows the structure:
-	localhost:8080 → local server 
-	Monica-School-API → repository/project name 
-	api/user/read.php → endpoint path
-	After clicking Send in Postman, the response is returned in JSON format

### HTTP Response 
This implements appropriate HTTP response codes (e.g. 200, 201, 204, 400, 401, 404, 500) across different endpoints. It helps clearly show the outcome of each request using standard HTTP status codes.

Example:
If a user sends a request to create a new event successfully, the API returns a **201** Created response. If the user tries to create an event with missing data, the API returns a **400** Incomplete data provided response.

## API Consumption (cURL)
A PHP-based client application was developed to consume the API using cURL. This application demonstrates the use of all HTTP request methods and displays responses in a user-friendly format.

The system processes each request by:
- Initialising a cURL session
- Setting the request method and endpoint URL
- Sending data where required 
- Getting the response from the API

### API Testing 
A basic PHP interface was created to test the API using a browser.
- `index.php` – form to select API requests  
- `result.php` – handles requests and shows results  
- `functions.php` – sends requests using cURL  

## OAuth Bearer Authentication
- `includes-api/authenticate.php` -  is responsible for handling Bearer token authentication across all API endpoints. It reads the Authorization header from incoming requests, extracts the Bearer token, and validates it using the OAuth user authentication class.
- `core/oauthUser.php` - this class manages OAuth Bearer token authentication. When a valid token is provided, the authenticated user's information is loaded. If the token is invalid or does not exist, authentication fails.

### Postman Authentication
For protected endpoints, use the Authorization tab in Postman.
- Type: Bearer Token
- Token: `{{bearer_token}}`
- The `{{bearer_token}}` variable should contain a valid access token for an authenticated user. All requests to protected endpoints must include this Bearer token.

### Postman Environments
Separate Postman environments were created for different user roles:
- Admin User
- Zoe Lecturer
- Kiara Student
