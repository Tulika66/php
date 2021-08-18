## About Project

A simple dummy CRUD application. Used Laravel, php and mysql as a Database. 
Demonstrating a UserClient entity , and how it interacts with db.  



## Execution Steps :

- git clone git@github.com:Tulika66/php.git

Major Dependencies to be installed 
- PHP
- Laravel
- Mysql and a Mysql-Client
 
Execution procedure

- put up the local server using (for testing purposes; for deployment use apache with command:  Sudo apachectl start ) :php artisan serve 
- Requests using POSTMAN :

                     - Get All Users.    : http://127.0.0.1:8000/api/userClient (GET)

                     - Get User By id.   : http://127.0.0.1:8000/api/userClient/{id} (GET)

                     -  Create User       : http://127.0.0.1:8000/api/userClient (POST)
                                          Request format (json) : 
                                                          {
                                                                "name":"shyam",
                                                                "surname":"lal"
                                                           }    
                                                   
                     - Delete User By id. : http://127.0.0.1:8000/api/userClient/{id} (DELETE)
