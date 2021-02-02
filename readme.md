
Api endpoints:

1) create user POST */api/register-user*
   ```
    {
        "name": "Mary",
        "email": "max@uasser.net",
        "phone": "+3709999299292"
    }
   
   Response 
   {"message":"user record created"}
   
2) get all users GET */api/users/list*
   ```
   Response 
   [
    {
        "id": 2,
        "name": "Max",
        "email": "max@user.net",
        "phone": "+3709999299292",
        "created_at": "2021-02-02 12:35:44",
        "updated_at": "2021-02-02 12:35:44"
    }
]

3) delete user DELETE *api/user/delete/{id}*

    ```
   Response
   {"message":"record deleted"}
