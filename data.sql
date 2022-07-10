CREATE DATABASE Sprint7;

USE Sprint7;

CREATE TABLE Projects (
id INT AUTO_INCREMENT PRIMARY KEY,
Project_Name varchar(30) NOT NULL);

CREATE TABLE Employees (
id INT AUTO_INCREMENT PRIMARY KEY,
Name varchar(30) NOT NULL,
Project_id INT,
FOREIGN KEY (Project_id) REFERENCES Projects(id));

INSERT INTO projects (Project_name)
VALUES ("C"), ("C++"), ("C#"), ("Go"), ("Javascript"), ("PHP");

INSERT INTO employees (Name, Project_id)
VALUES ("Petras", 1), ("Miša", 2), ("Igoris", 3), ("Stepas", 4), ("Mantė", 5), ("Markas", 6);