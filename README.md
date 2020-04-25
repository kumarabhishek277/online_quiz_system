# online_quiz_system

#information for database creation in MYSQL
#XAMPP

database name : studentprofile

tables name:
 1. student
    column name: fname varchar(40),lname varchar(40),gender varchar(10),email varchar(50),username varchar(14),pword varchar(14), nationality varchar(14), dob date, mobNumber bigint(10),address varchar(50)
    
    primary key : email
    
2. instructor
    column name: fname varchar(40),lname varchar(40),gender varchar(10),email varchar(50),username varchar(14),pword varchar(14), nationality varchar(14), dob date, mobNumber bigint(10),address varchar(50)
    
    primary key : email
    
3. quizname
    column name: quiz varchar(50), instructoremail varchar(50)
    
4. result
    column name : name varchar(50), studentemail varchar(55), marks int(5)
    
    primary key : name, studentemail
    
5. profileimg
    column name: emailid varchar(53), status varchar(10)
    
    primary key : emailid

6. feedbackform
    column name: quizname varchar(55), studentemail varchar(55), comment varchar(50)
