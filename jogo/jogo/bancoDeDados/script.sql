create database cangaceiros_db;
create table jogador (
id int primary key auto_increment,
nome varchar(100) not null, 
acertos int not null,
erros int not null,
data_atual varchar(20) not null,
tempo_atual varchar(20) not null);