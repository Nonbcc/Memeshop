create database phpshop;
use phpshop;

create table user
( user_id     int auto_increment,
  email  varchar(100) not null,
  pwd    varchar(20)  not null,
  name   varchar(50)  not null,
  primary key(user_id)
);

create table profile
( user_id  int,
  type varchar(5)  not null,
  primary key(user_id),
  foreign key (user_id) references user(user_id)
);

create table product
( product_id int auto_increment,
  product_name varchar(30) not null,	
  product_price  numeric(10,2) not null,
  product_quantity  int not null,
  product_detail varchar(1000),
  image_url varchar(500),
  primary key(product_id)
);

create table cart
( cart_id int auto_increment,
  user_id int,	
  product_id int,
  cart_quantity  int not null,
  primary key(cart_id,product_id),
  foreign key (product_id) references product(product_id),
  foreign key (user_id) references user(user_id)
);

insert into user values(1,"admin","1234","admin");
insert into profile values(1,"admin");

insert into product values(1,"Art Yawn",900.00,10,"--","https://media.discordapp.net/attachments/911152300184199218/919151016467918878/art_2.jpg?width=670&height=670");
insert into product values(2,"Beam First Collection",500.00,10,"--","https://media.discordapp.net/attachments/911152300184199218/919151016706965504/beam_collection1.jpg?width=670&height=670");
insert into product values(3,"Beam Second Collection ",500.00,10,"--","https://media.discordapp.net/attachments/911152300184199218/919151017034125333/beam_collection2.jpg?width=670&height=670");
insert into product values(4,"Book Floating",500.00,10,"--","https://media.discordapp.net/attachments/911152300184199218/919151017336119296/Book_2.jpg?width=670&height=670");
insert into product values(5,"Baby Book",700.00,10,"--","https://cdn.discordapp.com/attachments/911152300184199218/919151017742991441/book1.jpg");
insert into product values(6,"Angry Earthk",600.00,10,"--","https://media.discordapp.net/attachments/911152300184199218/919151018040778752/e1.jpg?width=670&height=670");
insert into product values(7,"Kiss Soju",700.00,10,"--","https://media.discordapp.net/attachments/911152300184199218/919151018317578260/kiss_soju.jpg?width=670&height=670");
insert into product values(8,"Hed Yhung",500.00,10,"--","https://media.discordapp.net/attachments/911152300184199218/919151018560851998/Pear3.jpg?width=670&height=670");
insert into product values(9,"app",900.00,10,"--","--");
