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
1. PHP for bakend
2. Install XAMPP and start Apache and MySQL.
3. Install Postman to test and interact with the API endpoints.
4. Import the `2026-schoolapi` database into phpMyAdmin.
5. Place the project folder inside the `htdocs` directory.
6. Access the API using:
   http://localhost:8080/Monica-School-API/
7. Import the provided Postman collections and environments to test the API endpoints.

## Database
The `2026-schoolapi` database contains the following tables that were used:

- **role** – defines user roles (Student, Lecturer, Admin)
- **user_account** – stores user login credentials and Bearer tokens
- **user_profile** – stores personal details such as name, email and address
- **user_calendar** – stores personal events of users
- **class** – stores class groups linked to courses
- **unit** – stores units linked to a course
- **unit_lecturer** – links lecturers to their units
- **unit_timetable** – stores scheduled sessions including room, day and time
- **attendance** – stores student attendance per session 
- **assignments** – stores assignment details including due dates and marks
- **grades** – stores marks and lecturer comments for student submissions


## Project Structure
- **api/** – This folder handles all the API endpoints. Inside this folder, there are subfolders for each type of resource.  
Examples:
  - /api/grades/ → Retrieve student grades 
  - /api/attendance/ → Retrieve attendance records 
  - /api/user/ → Handle user-related actions     

- **core/** – This folder contains the core logic of the API, such as classes that define how the application works. 
Example:
   -  `user.php` has the `user` class that handles reading user data.
   - `event.php` has the `event` class that handles reading, creating, updating or deleting event data.

- **includes-api/** – This folder contains files that help the API function properly:   
    - `config.php` – Sets up the database connection using PDO.   
    - `initialize.php` – Loads required classes and configuration so the endpoints can use them.

- **databaseExport** – This folder contains the `2026-schoolapi` database used for the project.

- **postmanCollection** – This folder contains all Postman collections used to test the API endpoints.

## Security Considerations
The API includes several security practices:
-	PDO prepared statements used to prevent SQL injection
- Input sanitised using htmlspecialchars() 
- Authentication is enforced using Bearer tokens to ensure only authorised users can access protected endpoints.
- Role-based restrictions are implemented to limit access depending on user type (Admin, Lecturer, Student).
- Endpoint access is validated through authentication checks before processing requests
- Structured request handling is used to reduce the risk of common API vulnerabilities


## Testing with Postman
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

## Testing Results
The API was thoroughly tested using Postman to verify correct functionality across all endpoints.

- GET requests successfully returned JSON data with HTTP 200 responses
- POST requests created new records and returned HTTP 201 Created
- PUT/PATCH requests successfully updated existing records
- DELETE requests returned HTTP 204 No Content upon successful deletion
- Invalid requests returned appropriate error codes such as 400 Bad Request and 401 Unauthorized

Authentication testing confirmed that protected endpoints correctly reject requests without a valid Bearer token.

## API Consumption (cURL)
A PHP-based client application was developed to consume the API using cURL. This application demonstrates the use of all HTTP request methods and displays responses in a user-friendly format.

The system processes each request by:
- Initialising a cURL session
- Setting the request method and endpoint URL
- Sending data where required 
- Getting the response from the API

### API Testing (PHP)
A basic PHP interface was developed to test and interact with the API through a web browser. This provides a simple front-end layer for sending HTTP requests without needing Postman for every test.
- `index.php` – displays a form that allows users to select different API requests (such as GET, POST, PUT, DELETE) and input required data where necessary.
-`result.php` – processes the selected request, sends it to the API, and displays the response returned from the server in a readable format in JSON.
- `includes-api/functions.php` – contains reusable functions that handle sending HTTP requests to the API using cURL, including setting request methods and headers.

This testing interface was useful for verifying API functionality during development and ensuring endpoints returned the correct responses in real time.

## OAuth Bearer Authentication
- `includes-api/authenticate.php` - handles authentication for all incoming API requests. It reads the Authorization header, extracts the Bearer token, and validates it against the authentication system. If the token is missing or invalid, access is denied and an appropriate HTTP response code is returned (e.g. 401 Unauthorized).
- `core/oauthUser.php` - manages the validation and processing of Bearer tokens. When a valid token is provided, the system identifies the associated user and loads their session details. If the token does not match a valid user or has expired, authentication fails and access is restricted

This system ensures that only authenticated users can interact with protected API endpoints, improving overall security and preventing unauthorised access.

### Postman Authentication
For protected endpoints, use the Authorization tab in Postman.
- Type: Bearer Token
- Token: `{{bearer_token}}`
- The `{{bearer_token}}` variable should contain a valid access token for an authenticated user. All requests to protected endpoints must include this Bearer token.

When sending requests to protected endpoints, Postman automatically includes this token in the `Authorization` header. The API then validates the token before processing the request. If the token is missing or invalid, the request is rejected with a `401 Unauthorized` response.

### Postman Environments
Separate Postman environments were created for different user roles:
- Admin User
- Zoe Lecturer
- Kiara Student
