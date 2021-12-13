drop database if exists WebPage;
create database WebPage;

drop user if exists admin_user;
create user 'admin_user'@'%' identified by '@Encrypto23';
grant all privileges on WebPage.* to 'admin_user'@'%';
flush privileges;

use WebPage;

create table categorias(
	idCategoria int primary key auto_increment not null,
    nombreCategoria varchar(50) not null,
    
    unique key idCategoria(idCategoria)
);

insert into categorias(nombreCategoria) values 
	(	'VIDEOJUEGOS'	), 
    (	'CONSOLAS'	),
    (	'FIGURAS'	),
    (	'MEDIAS'	),
    (	'CAMISAS'	),
    (	'ACCESORIOS'	);

drop table if exists marcas;
create table marcas(
	idMarca int primary key auto_increment not null,
    nombreMarca varchar(50) not null,
    
    unique key idMarca(idMarca)
);
    
INSERT INTO `marcas` (`nombreMarca`) 
	VALUES 	('funko'),
			('reddragon'),
            ('amazon'),
            ('superchiva'),
			('RedDragon'),
            ('BeDifferentCR');
            
insert into marcas(nombreMarca) values 
	(	'Nintendo'	), 
    (	'Xbox'	);

create table paises(
	idPais int primary key auto_increment not null,
    codPais varchar(4) not null,
    nombrePais varchar(50) not null
);

INSERT INTO `paises` (`codPais`, `nombrePais`) 
	VALUES 	('406', 'Costa Rica');

create table provincias(
	idProvincia int primary key auto_increment not null,
    nombreProvincia varchar(50) not null,
    
    idPais int not null,
    
    constraint FK_IDPAIS foreign key(idPais) references paises(idPais)
);

INSERT INTO provincias (nombreProvincia, idPais)
	VALUES 	('SAN JOSE', 1),
			('HEREDIA', 1),
			('CARTAGO', 1),
			('ALAJUELA', 1);

create table roles(
	idRol int primary key NOT NULL AUTO_INCREMENT,
    rol VARCHAR(15) NULL,
	rolInfo VARCHAR(30) NOT NULL,
	rolStatus Boolean,
    
	unique key idRol(idRol)
);

INSERT INTO roles (rol, rolInfo, rolStatus)
	values 	('dev', 'developers', true),
			('user', 'usuario', true);

drop table if exists usuarios;
create table usuarios(
	idUsuario int primary key auto_increment not null,
    nombreUser varchar(30) not null,
    apellido1Usuario varchar(30) not null,
    apellido2Usuario varchar(30) not null,
    passwordUsuario varchar(255) not null,
    mailUsuario varchar(50) not null
);

INSERT INTO usuarios (nombreUser, apellido1Usuario, apellido2Usuario, passwordUsuario, mailUsuario)
	values 	('Fabián', 'Madriz', 'Villalta', md5(12345), 'fabimv23@gmail.com'),
            ('Luis', 'R', 'E', md5(123), 'asd@asd.com');

create table empleados(
	idEmpleado int primary key auto_increment not null,
    cedulaEmpleado int unique key not null,
    nombreEmpleado varchar(50) not null,
    apellidoEmpleado varchar(50) not null
);

INSERT INTO `empleados` (`cedulaEmpleado`, `nombreEmpleado`, `apellidoEmpleado`) 
	VALUES 	('114180039', 'luis', 'ramirez'),
			('118065478', 'fabian', 'madriz'),
            ('151307035', 'andres', 'brizuela'),
            ('193110484', 'isaac', 'chacon');

drop table if exists locales;
Create Table locales (
	idLocal int primary key auto_increment not null,
    nombreLocal varchar(50) not null,
    direccion varchar(100)unique key not null,
    
    idPais int not null,
    idProvincia int not null,
    idEmpleado int not null,
    
    foreign key(idPais) references paises(idPais),
    constraint FK_IDEMPLEADO foreign key (idEmpleado) references empleados(idEmpleado)
);

INSERT INTO `locales` (`nombreLocal`, `direccion`, `idPais`, `idProvincia`, `idEmpleado`) 
	VALUES 	('san jose', 'sanjo', '1', '1', '1'),
			('san pedro', 'san pedro', '1', '1', '1'),
            ('curri', 'curri', '1', '1', '1');

drop table if exists Proveedores;
create table Proveedores(
    idProveedor int primary key auto_increment not null,
    nombreProveedor varchar(50) not null,
    telefono varchar(9) null,
    email varchar(50) null
);

INSERT INTO Proveedores(nombreProveedor, telefono, email)
	value	('Alfredo', 	7777-2222, 'alfredo@gmail.com'),
			('Marcos', 		8888-8888, 'marcos@gmail.com'),
			('Jose', 		9999-1111, 'jose@gmail.com'),
            ('Alexander', 	2222-3333, 'alex@gmail.com'),
            ('Spencer', 	1111-4444, 'spencer@gmail.com');

drop table if exists Productos;
create table Productos(
	idProducto int primary key auto_increment not null,
    codBarras int unique key not null,
    nombreProducto varchar(50) not null,
    descripProducto varchar(100) not null,
    precioVenta double not null,
    
    idLocal int not null,
    idCategoria int not null,
    idMarca int not null,
    
    constraint FK_IDCATEGORIA foreign key(idCategoria) references categorias(idCategoria),
    constraint FK_IDMARCA foreign key(idMarca) references marcas(idMarca),
    foreign key(idLocal) references locales(idLocal)
);

ALTER TABLE productos ADD COLUMN url_imagen VARCHAR(150) AFTER `descripProducto`;

INSERT INTO `productos` (`codBarras`, `nombreProducto`, `descripProducto`, `url_imagen`, `precioVenta`, `idLocal`, `idCategoria`, `idMarca`) 
	VALUES 	('1232', 'Funko Loki', 'Funko Loki', 'img/productos/loki.jpg', '8000', '1', '3', '1'),
			('1233', 'Funko Vader', 'Funko Vader', 'img/productos/vader.jpg', '8000', '1', '3', '1'),
            ('1234', 'Funko Naruto', 'Funko Naruto', 'img/productos/Naruto.jpg', '8000', '1', '3', '1'),
            ('1235', 'Funko Iron Man', 'Funko Iron Man', 'img/productos/Iron Man.jpg', '8000', '1', '3', '1'),
            ('1236', 'Funko joker', 'Funko joker', 'img/productos/joker.jpg', '8000', '1', '3', '1'),
            ('1237', 'Funko Navas', 'Funko Navas', 'img/productos/navas.jpg', '8000', '1', '3', '1'),
            ('1238', 'Medias caballeros del zodiaco', 'Medias caballeros del zodiaco', 'img/productos/caballeros del zodiaco.jpg', '5000', '1', '4', '4'),
            ('1239', 'Medias Calicaturas navideñas', 'Medias Calicaturas navideñas', 'img/productos/Calicaturas navideñas.jpg', '5000', '1', '4', '4'),
            ('1240', 'Medias Gunns and Roses', 'Medias Gunns and Roses', 'img/productos/Gunns and Roses.jpg', '5000', '1', '4', '4'),
            ('1241', 'Medias Mario Bros', 'Medias Mario Bros', 'img/productos/Mario Bros.jpg', '5000', '1', '4', '4'),
            ('1242', 'Medias pink floyd', 'Medias pink floyd', 'img/productos/pink floyd.jpg', '5000', '1', '4', '4'),
            ('1243', 'Medias Pinky y Cerebro', 'Medias Pinky y Cerebro', 'img/productos/Pinky y cerebro.jpg', '5000', '1', '4', '4'),
            ('1244', 'Medias Pac-man', 'Medias Pac-man', 'img/productos/Pac-man.jpg', '5000', '1', '4', '4'),
            ('1245', 'Camisa Squirtle', 'Camisa negra con impresion', 'img/productos/squartle.jpg', '15000', '1', '5', '6'),
            ('1246', 'Camisa Demon Slayer', 'Camisa negra con impresion', 'img/productos/demon-slayer.jpg', '15000', '1', '5', '6'),
            ('1247', 'Camisa Demon Slayer2', 'Camisa negra con impresion', 'img/productos/demon-slayer2.jpg', '15000', '1', '5', '6'),
            ('1248', 'Camisa Jujutsu Kaisen', 'Camisa negra con impresion', 'img/productos/jujutsu-kaisen.jpg', '15000', '1', '5', '6'),
            ('1249', 'Camisa Evangeleon', 'Camisa negra con impresion', 'img/productos/evangeleon.jpg', '15000', '1', '5', '6'),
            ('1250', 'Camisa Magicarp', 'Camisa negra con impresion', 'img/productos/magicarp.jpg', '15000', '1', '5', '6');

drop table if exists repartidores;
create table repartidores(
	idRepartidor int primary key auto_increment not null,
    nombreRepartidor varchar(30) not null,
    apellidoRepartidor varchar(30) not null,
    telefono varchar(9) not null,
    email varchar(30) null
);

INSERT INTO Repartidores (nombreRepartidor, apellidoRepartidor, telefono, email)
	VALUES 	('María', 'Venegas', '1111-2222', 'mvenegas@gmail.com'),
			('Leonardo', 'Vinicio', '3333-4444', 'lvinicio@gmail.com'),
			('Juan', 'Granados', '5555-6666', 'jgranados@gmail.com'),
			('Mario', 'Cascante', '7777-8888', 'mcascante@gmail.com'),
			('Sofía', 'Castro', '9999-1111', 'scastro@gmail.com');

drop table if exists Pedidos;
create table pedidos(
	idPedido int primary key auto_increment not null,
    idLocal int not null,
    idRepartidor int not null,
    estadoPedido boolean not null,
    fecha date not null,
    paga double not null,
    
    foreign key (idLocal) references locales(idLocal),
    constraint FK_IDREPARTIDOR foreign key(idRepartidor) references Repartidores(idRepartidor)
);

drop table if exists DetallePedidos;
create table DetallePedidos(
	numLinea int  primary key auto_increment not null,
	idPedido int not null,
    idProducto int not null,
    cantidad int not null,
    totalLinea double not null,
    
    constraint FK_IDPEDIDO foreign key (idPedido) references Pedidos(idPedido),
    constraint FK_IDPRODUCTO foreign key (idProducto) references Productos(idProducto)
);

drop table if exists R_RepPed;
create table R_RepPed(
	idRepartidor int not null,
    idPedido int not null,
    
    foreign key (idRepartidor) references repartidores(idRepartidor),
    foreign key (idPedido) references pedidos(idPedido),
    
    primary key (idRepartidor, idPedido)
);
