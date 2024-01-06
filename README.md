I completed this project as part of my internship at HyperPay in the summer of 2023. The project is a simple 
company webpage with typical features such as a home page, FAQ page, Clients page, admin side edit page, News page,
and additionally a to do list unique for each user. The FAQ, Clients, and to do list tasks, are all stored in a 
database and can be editted by the admin (FAQ and Clients) and by the users (to do list tasks). 

I completed the project in the Laravel framework, which is mainly programmed in PHP and Blade. The folders committed
in this project are organized based on the Laravel framework. The following is a manual of where to find each aspect
of my code:

- The business logic, extracting from the database, and how the webpages are routed can be found under /App/Http/Controllers
- The middleware, access restrictions, and authorization are handled under /App/Http/Controllers/Auth and under
  /App/Http/Middleware
- The object oriented design for database elements and more can be found under /App/Models
- The database migrations, descriptions of database tables, and how the database was built is under /Database/Migrations
- Public elements such as images, and my CSS designs are under /Public/images and /Public/css respectively.
- The views, frontend programs, and the layouts in HTML are all under /Resources/Views , you can find the main
  layouts under /Resources/Views/Layouts and you can find specific page designs are directly under /Resources/Views
- The main routes, authorizations, and middlewares can be found in /Routes/web.php
