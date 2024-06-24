
MYSQL: DBMS -> database Management system

SQL: Structure Query Language

Types of SQL:

DDL:

DML:

TCL:

DQL: 


CREATE:
CREATE DATABASE DATABASE_NAME;

CREATE TABLE TABLE_NAME (
    ID INT AUTO_INCREMENT PRIMAY KEY,
    NAME VARCHAR (50) NOT_NULL,

)
---------------------------------------------------------------
INSERT:
INSERT INTO TABLE_NAME (FIELD_NAME1, FIELD_NAME2,....)
VALUES ('$VALUE1', '$VALUE2', .....);


UPDATE:
UPDATE TABLE_NAME SET FIELD1='$VALUE1', FIELD2='$VALIE2', .... CONDITION(WHERE);

e.g.
UPDATE `users` SET `name`='Ram',`username`='Ram123',`email`='Ram@gmail.com',`password`='fsfsdfsdfsdf' WHERE id=2

DELETE:
DELETE FROM TABLE_NAME CONDITION;

SELECT:
SELECT *FROM TABLE_NAME;
SELECT FIELD1, FIELD2 FROM TABLE_NAME;
SELECT FIELD1, FIELD2 FROM TABLE_NAME CONDITION;

DROP: (DELETE DATABASE OR TABLE )
DROP DATABASE DATABASE_NAME;
DROP TABLE TABLE_NAME


ALTER: (ADD OR DELETE COLUMN AND UPDATE THE COLUMN NAME)

ALTER TABLE table_name
ADD column_name datatype;

ALTER TABLE table_name
DROP COLUMN column_name;

ALTER TABLE table_name
RENAME COLUMN old_name to new_name;
-------------------------------------------------------------------


php
