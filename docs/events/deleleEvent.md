# Delete Event

## Description
Deletes an event from the system using its ID (calendarId).


## Endpoint
DELETE api/event/delete.php

http://localhost:8080/Monica-School-API/api/event/delete.php?id=9


## Parameters
- id (integer): The ID of the event (calendarId)

Response Example (Success)

```json
{
  "message": "Event deleted."
}
```
Response Example (Error)
```json
{
  "message": "Event not deleted."
}
```

## Status Codes
- 200 OK → Event deleted successfully
- 400 Bad Request → Missing event ID
- 401 Unauthorized → Invalid or missing OAuth token
- 405 Method Not Allowed → Wrong request method
- 500 Internal Server Error → Event not deleted
