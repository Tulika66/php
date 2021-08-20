
## About Project

A simple using Laravel, php and mysql as a Database. 
Demonstrating a social Media application . 



## Execution Steps :

- git clone git@github.com:Tulika66/php.git

Major Dependencies to be installed 
- PHP
- Laravel
- Mysql and a Mysql-Client
 
Execution procedure

- put up the local server using (for testing purposes; for deployment use apache with command:  Sudo apachectl start ) :php artisan serve 
- Requests using POSTMAN :

                     - Get All Users.    : http://127.0.0.1:8000/api/users (GET)

                     - Get User By id.   : http://127.0.0.1:8000/api/users/{id} (GET)

                     -  Create User      : http://127.0.0.1:8000/api/users (POST)
                                          Request format (json) : 
                                                          {
                                                                "name":"rahul rajesh patel",
                                                                "phone":"9887777787"
                                                           }    
                                                   
                     - Delete User By id. : http://127.0.0.1:8000/api/userClient/{id} (DELETE)
                     
                     - Get All Posts      : http://127.0.0.1:8000/api/posts (GET)
                     
                     - Get Post Of User : http://127.0.0.1:8000/api/posts/{id} (GET)
                     
                     - Create Post Of User : http://127.0.0.1:8000/api/posts/{id} (POST)
                     
                     - Update Post Of User : http://127.0.0.1:8000/api/posts/{userID}/{id} (PUT)
                     
                     - Delete Post Of USER : http://127.0.0.1:8000/api/posts/{post_id}/{user_id} (DELETE)
                     
                     - Get Comments Of post : http://127.0.0.1:8000/api/posts/{id} (GET)
                                          
                     - Create Comment for Post  : http://127.0.0.1:8000/api/posts/{id} (POST)
                                          
                     - Update Comment Of Post : http://127.0.0.1:8000/api/posts/{postID}/{id} (PUT)
                                          
                     - Delete comment Of post : http://127.0.0.1:8000/api/posts/{comment_id}/{post_id} (DELETE)
                                          
                                          
