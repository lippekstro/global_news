create table usuario (
id_usuario int not null auto_increment,
nome_usuario varchar(200) not null,
email varchar(200) not null,
senha varchar(200) not null,
nivel_acesso int not null default 1,
primary key (id_usuario)
);

INSERT INTO usuarios (nome_usuario, email, senha) VALUES ('Admin', 'admin@mail.com', '$2y$10$dE0FnEqee2fdxfKhWddFpOt55BgTw5oj7OsAq0xfXXyLBV1HKVVAi');

create table categoria (
id_categoria int not null auto_increment,
nome_categoria varchar(200) not null,
primary key (id_categoria)
);

create table postagem (
id_post int not null auto_increment,
titulo varchar(250) not null,
conteudo longtext not null,
imagem longblob,
data_pub timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
id_usuario int not null,
id_categoria int not null, 
primary key (id_post),
foreign key (id_usuario) references usuario(id_usuario),
foreign key (id_categoria) references categoria(id_categoria)
);