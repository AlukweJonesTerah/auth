Distributed System Assignment
Create a Login System
Requirements:
    1. Signup
        - Username
        - Email
        - Password
        - confirm password

    2. Login
        - Username
        - Password

    3. Recover Password
        - Email
        - Code

    4. Profile Page
        - Address
        - Registration number
        - phone number

    5. The Database (Account)
        - uid
        - regno
        - uname
        - uemail
        - psw
        - addr
        - phoneno

Form Validation: ✓
    1. remove  HTML's default form Validation ✓
    2. From the client side, check if:
        Signup:
        - Inputs are empty ✓
        - Username is properly formatted ✓
        - Email is properly formatted ✓
        - Password is strong ✓
        - Passwords match ✓

        Login:
        - Inputs are empty ✓

    3. From The Server side, check if:
        Signup:
        - Username exists ✓
        - Email exists ✓

        Login:
        - Username exists 
        - Password is correct 

    4. Password Recovery:
        - Email exists ✓
        - Send Code to email ✓
        - Code is correct ✓
        - Password is strong ✓
        - Passwords match ✓
# This is a php auth system that allows you to register, login, search for a user using username and resetting passwords

# To use this project ensure mysql server, xampp, wampp, or lampp are working correctly start the server and create the database

# create the database 'loginsys' and improt the models/table
# run the project using localhost, to send emails configure you xampp, wampp, lampp or mysql servers to allow you to send emails

# auth
