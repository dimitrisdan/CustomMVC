Custom MVC Framework
====================
This is a  basic Model-View-Controller (MVC) framework written in the PHP programming language. The URL structure follow the standard MVC pattern of: 
> http://domain/controller/action/id

where action and id is optional. Working Links

`GET  /`

`GET  /home`

`GET  /about-us`

`GET  /contact-us`

`POST /contact/create`

Installation
------------

Download or clone the repository to a working Apache web server with PHP and MySQL. 
Run the script cmvc_db.sql to create the database and the tables 

Tested versions include Apache 2.4.18 and PHP 5.6

Project Structure
-----------------

app/    Controllers, Models, Views and Routing.
config/ App and DB Configuarion files.
files/  The files from the form are uploaded here. 
lib/    Libraries.
public/ Public folder. Include all css and js files in this directory.
  
Routing
-------
Simply, add a new row in the array of the form 

"url" => [ "http_verb" , "Controller", "Action" ]

like the default:

$routes = [
    "" => [ "get" ,"HomeController", "index" ],
    "home" => [ "get" ,"HomeController", "index" ],
    "contact-us" =>[ "get", "ContactController", "index" ] ,
    "about-us" => [ "get", "AboutController", "index" ] ,
    "contact/create" =>[ "post", "ContactController", "create" ]
];
