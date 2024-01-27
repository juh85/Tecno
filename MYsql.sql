use SiteTeste;

create table dados (
id int auto_increment primary key,
nome varchar (30) not null,
idade tinyint not null,
estado varchar (20) not null,
telefone int(20) not null, 
email varchar (50) not null
);
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
create table estado (
id int auto_increment primary key,
estado varchar (50)
); 
select *from estado;
SELECT * FROM dados INNER JOIN estado ON dados.estado = estado.id;

create table usuario (
id_usuario int auto_increment primary key,
usuario varchar(30) not null,
senha varchar(100) not null,
cpf varchar(11) not null,
nome varchar(11) not null,
);
select*from usuario


