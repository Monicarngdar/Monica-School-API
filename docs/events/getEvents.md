# Get Events

## Description
Returns a list of all events in the system. Each event contains user information, event date, description, and type.

## Endpoint
GET api/event/read.php

http://localhost:8080/Monica-School-API/api/event/read.php


## Response

```json
{
  "data": [
    {
      "calendarId": 4,
      "userId": 25,
      "eventDate": "2026-04-05",
      "eventDescription": "Easter Lunch",
      "eventType": "School Holidays"
    },
    {
      "calendarId": 9,
      "userId": 25,
      "eventDate": "2026-05-30",
      "eventDescription": "Go on a walk",
      "eventType": "School Holidays"
    },
    {
      "calendarId": 10,
      "userId": 25,
      "eventDate": "2026-05-30",
      "eventDescription": "Book a trip",
      "eventType": "School Holidays"
    }
  ]
}
```

## Status Codes
- 200 OK → Events retrieved successfully
- 401 Unauthorized → Invalid or missing OAuth token
- 404 Not Found → No events found
- 500 Internal Server Error → Server error