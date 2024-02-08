use SiteTeste;

create table dados (
id int auto_increment primary key,
nome varchar (30) not null,
idade tinyint not null,
estado varchar (20) not null,
telefone int(20) not null, 
email varchar (50) not null
);
update dados SET nome= 'Davi Junior0', email= 'davi@gmail.com', telefone= '(61)11102-2362', estado= '22', dtnascimento= '2000-05-16' WHERE id = '24'

/*renomear nome do campo*/
alter table dados RENAME column idade to nascimento;

/*criar novo campo na tabela*/
alter table dados add column dtnascimento date;
alter table dados add column estado int;

/*excluir campo antigo*/
alter table dados drop column nascimento;

/*adicionar chave estrangeira*/
alter table dados add foreign key (estado) references estado(id);

select * from dados;
SELECT estado.id as id_estado, estado.estado as nome_estado,dados.* FROM dados INNER JOIN estado ON dados.estado = estado.id

create table estado (
id int auto_increment primary key,
estado varchar (50)
); 
select *from estado;
SELECT * FROM dados INNER JOIN estado ON dados.estado = estado.id;

create table usuario (
id_usuario int auto_increment primary key,
cpf varchar(11) not null,
senha varchar(100) not null,
nome varchar(100) not null
);
drop table usuario
select *from usuario
alter table usuario add column email varchar (155);

SELECT * FROM usuario where cpf='.$cpf.' and senha='.$senha.'


SELECT * FROM usuario where id_usuario="1"

update usuario SET cpf = '46006250802', nome= 'Kleber N Mendes', email= 'klebinho@gmail.com' WHERE id_usuario = '1'