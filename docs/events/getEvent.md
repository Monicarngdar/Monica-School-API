# Get Single Event

## Description
Returns a single event based on its ID.

## Endpoint
GET api/event/readSingle.php

http://localhost:8080/Monica-School-API/api/event/readSingle.php?id=9

## Parameters
- id (integer): The ID of the event (calendarId)

## Response

```json
{
    "calendarId": 4,
    "userId": 25,
    "eventDate": "2026-04-05",
    "eventDescription": "Easter Lunch",
    "eventType": "School Holidays"
}
```
## Status Codes
- 200 OK → Event found
- 400 Bad Request → Missing event ID
- 401 Unauthorized → Invalid or missing OAuth token
- 404 Not Found → Event not found
- 500 Internal Server Error → Server error