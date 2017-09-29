# API Operations

The following API operations are available:
| Operation        | Description            |
| ------------- |:-------------:|
|User & Account      | Create, update, list  |
| Tasks     |  Create, update, list       |
| Comment | Create, update, list       |

# URL Structure
The following is the API URL request structure:
```
https://<hostName>/api/<resourceGroup>/<resourceIdentifier>?<operationparameter>token=<token>
```
```
* <hostName>: Host name for the service.```
* <resourceGroup>: a resource group. For example, user.
* <resourceIdentifier>: A resource identifier. This is only required if the API call is on a specific resource such as aborting a specific execution.
* <operationParameters>: One or more required parameters specified using name-value pairs prefixed by the & character. For example, &task_type=bug.
```

# Authentication & Authorization

It is strongly recommended to use the securityToken parameter to provide your personal valid token(JWT).

JWT created based on User Object

# Protocols
The API request can be transmitted to the API server using either the GET or the POST or the PUT or DELETE HTTP methods. To use the GET method, simply specify the request as a URL. Parameter values must be encoded to prevent conflicts with HTTP special characters. 

The following example shows the URL for getting a list of all connected method
#### GET
```
http://<hostname>/api/task?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3QiLCJpYXQiOjE1MDY1MTk1MzQsImV4cCI6MTUwNzMwMzEzNCwibmJmIjoxNTA2NTE5NTM0LCJqdGkiOiIzcEJmenJzTjFmcG5yd1NIIn0.C9aulfLkFyquxND7aQOdM16T_9OAgfi1IV0xGORBWs8

http://<hostname>/api/user/1?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3QiLCJpYXQiOjE1MDY1MTk1MzQsImV4cCI6MTUwNzMwMzEzNCwibmJmIjoxNTA2NTE5NTM0LCJqdGkiOiIzcEJmenJzTjFmcG5yd1NIIn0.C9aulfLkFyquxND7aQOdM16T_9OAgfi1IV0xGORBWs8

http://<hostname>/api/search?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3QiLCJpYXQiOjE1MDY1MTk1MzQsImV4cCI6MTUwNzMwMzEzNCwibmJmIjoxNTA2NTE5NTM0LCJqdGkiOiIzcEJmenJzTjFmcG5yd1NIIn0.C9aulfLkFyquxND7aQOdM16T_9OAgfi1IV0xGORBWs8

```
#### POST
```
http://<hostname>/api/user?name=ram&email=te1st242@test.com&password=123456&token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3QiLCJpYXQiOjE1MDY1MTk1MzQsImV4cCI6MTUwNzMwMzEzNCwibmJmIjoxNTA2NTE5NTM0LCJqdGkiOiIzcEJmenJzTjFmcG5yd1NIIn0.C9aulfLkFyquxND7aQOdM16T_9OAgfi1IV0xGORBWs8

http://127.0.0.1:8000/api/comment?comments=mytask&task_id=2&token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3QiLCJpYXQiOjE1MDY1MTk1MzQsImV4cCI6MTUwNzMwMzEzNCwibmJmIjoxNTA2NTE5NTM0LCJqdGkiOiIzcEJmenJzTjFmcG5yd1NIIn0.C9aulfLkFyquxND7aQOdM16T_9OAgfi1IV0xGORBWs8


```
#### PUT
```
http://<hostname>/api/user/1?name=ram&email=te1st242@test.com&password=123456&token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3QiLCJpYXQiOjE1MDY1MTk1MzQsImV4cCI6MTUwNzMwMzEzNCwibmJmIjoxNTA2NTE5NTM0LCJqdGkiOiIzcEJmenJzTjFmcG5yd1NIIn0.C9aulfLkFyquxND7aQOdM16T_9OAgfi1IV0xGORBWs8

http://127.0.0.1:8000/api/comment/1?comments=mytask&token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3QiLCJpYXQiOjE1MDY1MTk1MzQsImV4cCI6MTUwNzMwMzEzNCwibmJmIjoxNTA2NTE5NTM0LCJqdGkiOiIzcEJmenJzTjFmcG5yd1NIIn0.C9aulfLkFyquxND7aQOdM16T_9OAgfi1IV0xGORBWs8


```

# Response Formats
The default response format is JSON. Most operations support the optional parameter responseFormat for specifying the required format. 

JSON - For more information about the JSON format, see http://www.json.org.

The following examples show the response type for a request to start a new execution:

#### JSON
```
{
    "error": false,
    "message": [
        {
            "id": 1,
            "task_desc": "Task details mytask",
            "task_type": "feature",
            "task_status": "new",
            "created_at": "2017-09-27 14:34:55",
            "updated_at": "2017-09-27 14:34:55",
            "created_by": {
                "id": 1,
                "name": "ram",
                "email": "test@test.com",
                "created_at": "2017-09-27 14:34:31",
                "updated_at": "2017-09-28 03:13:36"
            },
            "updated_by": {
                "id": 1,
                "name": "ram",
                "email": "test@test.com",
                "created_at": "2017-09-27 14:34:31",
                "updated_at": "2017-09-28 03:13:36"
            },
            "comment": [
                {
                    "id": 1,
                    "comments": "welcome",
                    "task_id": 1,
                    "remainder_date": "2017-09-30 14:41:29",
                    "created_at": "2017-09-27 14:43:48",
                    "updated_at": "2017-09-29 05:17:24",
                    "created_by": 1,
                    "updated_by": 1
                }
            ]
        }
    ]
}
```

### Operation

#### User
	/api/user (GET) - Fetch all User Details
	/api/user/id (GET) - Fetch Specific User Details
	/api/user (POST) - Create new User with token update in db
	/api/user (PUT) - Update Exisitng user with token update
	
#### Task
	/api/task (GET) - Fetch all Task details
	/api/task/id (GET) - Fetch specific Task Details
	/api/task (POST) - Create new Task Details
	/api/task (PUT) - Update Task Details 
	
#### Comment
	/api/comment (GET) - Fetch all Comment details
	/api/comment/id (GET) - Fetch all Comment details
	/api/comment (POST) - Create new Comment details and update based on Task model
	/api/comment (PUT)	- Edit existing Comment details and update based on in Task model
			

#### Task Search
	created_by - <optional filter parameter>
	
	/api/search?created_by=own&token=<token>  // 'own' - retrieve record based on user_id from token to fetch created_by of task 	
	/api/search?created_by=1&token=<token>  // 1 - retrieve record based on user_id to fetch created_by of task 

	task_type - <optional filter parameter>
	
	/api/search?task_type=bug&token=<token>  // 'bug' - retrieve record based on task_type to fetch created_by of task 	

	task_status - <optional filter parameter>
	
	/api/search?task_type=new&token=<token>  // 'new' - retrieve record based on task_status to fetch created_by of task 	
	
	limit - <optional filter parameter> - offset default =0
	
	/api/search?limit=10&token=<token>  // 'limit and offset' - retrieve record based on limit and offset to fetch created_by of task 		
	
	task_id - <optional filter parameter> 
	
	/api/search?task_id=10&token=<token>  // '10' - retrieve record based on task_id and offset to fetch created_by of task 


# Error Handling
Error messages returned in the response of an API operation are self-explanatory and should be sufficient to resolve issues, as can be seen from the following examples:
```
{
    "error": "User not Available ..."
}

```
