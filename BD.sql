drop table usuarios cascade;

create table usuarios (
    id       bigserial   constraint pk_usuarios primary key,
    nick     varchar(15) not null constraint uq_usuarios_nick unique,
    password char(32)    not null constraint ck_password_valida
                         check (length(password) = 32));

drop table twits cascade;

create table twits (
    id          bigserial    constraint pk_twit primary key,
    texto         varchar(140) not null,
    fecha    timestamp    default current_timestamp,
    usuario_id  bigint    not null constraint fk_twit_usuarios
                          references usuarios (id)
                          on update cascade
                          on delete cascade
     );
insert into usuarios (nick, password)
  values ('pepe', md5('pepe'));
  insert into usuarios (nick, password)
  values ('luis', md5('luis'));
insert into twits (texto, fecha, usuario_id)
values ('esto es una prueba', default, 1);
insert into twits (texto, fecha, usuario_id)
values ('otra prueba', default, 2);
