# OAuth Bearer Authentication

## Overview
This documentation project explains how authentication is implemented across the API and how developers can securely access protected endpoints.

This system uses OAuth Bearer Token authentication to ensure that only authorised users can interact with restricted resources.

## Purpose

This authentication system is used to:

- Secure API endpoints from unauthorised access
- Identify and validate users making requests
- Control access based on user roles (Admin, Lecturer, Student)
- Support integration with external applications consuming this API

How It Works

1. A user logs in through the authentication system.
2. A Bearer token is generated and assigned to the user.
3. The token is sent with every API request in the request header.
4. The API validates the token before allowing access to any protected endpoint.
5. If the token is valid, the request proceeds.
6. If invalid or missing, the request is rejected with an Unauthorized response.

## Usage in Requests

All protected endpoints require an Authorization header:

- Type: Bearer Token
- Format: Authorization: Bearer `{{bearer_token}}`
- Each Postman environment contains a predefined `{{bearer_token}}` variable depending on the user role.

Postman Environment

- Each Postman environment contains a variable: `{{bearer_token}}`
- This allows different user roles to use different tokens.

## Access Control (Role-Based Permissions)
- This API uses role-based access control
- Even if a user is successfully authenticated, some endpoints are restricted depending on their role.

## Request Header Example
When sending a request to a protected endpoint, include the token in the header like this:

```http
Authorization: Bearer {your_token_here}
```

## Token Validation
- If the token is **missing** → `401 Unauthorized`
- If the token is **invalid or does not match any user** → `401 Unauthorized`
- If the token is valid but the **role has no permission** → `403 Forbidden`

### Example Responses
401 Unauthorized (Missing or Invalid Token)
```json
{
  "message": "Invalid or missing OAuth2 Bearer."
}
```

403 Forbidden (Valid Token but No Permission)
```json
{
  "message": "You do not have the necessary permissions to access this resource."
}
```

