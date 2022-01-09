DROP DATABASE CRS;

CREATE DATABASE CRS;

USE CRS;

CREATE TABLE sys_user (user_id int AUTO_INCREMENT, user_name varchar(255) not null, registeration_date date default CURRENT_DATE
                       , email varchar(255) not null,user_password varchar(225) not null,user_role varchar(10) not null, PRIMARY KEY(user_id));

CREATE TABLE car (car_plate_id char(7) ,car_manufacture varchar(255) not null,car_model varchar(255) not null,car_year year not null,car_status varchar(255) not null
                  , daily_rent decimal(10,5) not null,distance_covered int,office varchar(255) not null,PRIMARY KEY(car_plate_id));

CREATE TABLE reservation(reservation_id int AUTO_INCREMENT,user_id int,car_plate_id char(7) not null,payment_id int not null,reservation_day date not null
                         ,return_day date not null,reservation_period int not null, PRIMARY KEY(reservation_id));

CREATE TABLE payment (payment_id int ,payment_method varchar(10) ,payment_date date default curdate(),payment_amount decimal(10,5) not null,payment_status varchar(10) default 'UNPAID', PRIMARY KEY(payment_id));


ALTER TABLE reservation ADD FOREIGN KEY (user_id) REFERENCES sys_user (user_id);

ALTER TABLE reservation ADD FOREIGN KEY (car_plate_id) REFERENCES car (car_plate_id);

ALTER TABLE reservation ADD FOREIGN KEY (payment_id) REFERENCES payment (payment_id);