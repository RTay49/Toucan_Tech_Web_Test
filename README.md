# Toucan_Tech_Web_Test


Introduction This is my ToucanTech web test answer The backend is written in php using the framework codeingighter that you will need to install and merge these files with The database is written in sql set up database with application/config/database.php

Install To install extract the html folder on your sever. and write the database instructions in ToucanTech DB into sql then go to localhost.

files of inertest controllers located at application/controllers

Members.php
Pages.php
Schools.php
models located application/mdels

Members_model.php
Relations_models.php
Schools_model.php
member views located at applications/views/members

index.php
signup.php
success.php
view.php
school views located at applications/views/schools

index.php
view.php
templates located application/views/templates

header.php
footer.php
routes located at application/config/routes.php database set up at application/config/database.php

Service The service should be able to allow the entry of new members to schools list members dynmaicly and schools and update their relations on the view pages of each.

Problems

Main problem with this webapp is a lot of code dupications and and a Use of some inheritance could be used to aid this

far too big model class Some refactoring with realtions and perhaps a new controller may aid this

the webstie looks pretty dull and not very flashy css and beeter html to make that pages look more interesting and some javascript/jquery could go along way to imporve user experience

emails and same name members can be entered twice Some sql satements could be used to make sure duplicate entries for email etc can't be entered.
