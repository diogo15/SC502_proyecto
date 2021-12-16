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
    (	'Xbox'	),
    (	'Hot Toys'	),
    (	'Playstation'	);

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
            ('1250', 'Camisa Magicarp', 'Camisa negra con impresion', 'img/productos/magicarp.jpg', '15000', '1', '5', '6'),
            ('1251', 'figura Back to the Future', 'Figura Vuelta al Futuro', 'img/productos/backToTheFutureFigures.jpg', '170000', '1', '3', '9'),
            ('1252', 'figura Boba Fett', 'Figura BobaFett', 'img/productos/boba-fettFigures.png', '300000', '1', '3', '9'),
            ('1253', 'control de Ps5', 'Control de Playstation 5', 'img/productos/control-de-ps5.jpg', '50000', '1', '6', '10'),
            ('1254', 'control de xbox edicion carbon', 'Control de Xbox carbon Edition', 'img/productos/control-xbox-series-sx-carbon-black1.jpg', '50000', '1', '6', '8'),
            ('1255', 'control switch', 'Control de Switch', 'img/productos/controlSwitch.jpg', '30000', '1', '6', '7'),
            ('1256', 'figura DBZ', 'Figura de Dragon Ball Z', 'img/productos/DBZFigure.jpg', '15000', '1', '3', '3'),
            ('1257', 'figura DBZ2', 'Figura de Dragon Ball Z Hot Toys Edition', 'img/productos/DBZFigures.jpg', '100000', '1', '3', '9'),
            ('1258', 'figura deadpool', 'Figura DeadPool', 'img/productos/deadpoolFigures.jpg', '160000', '1', '3', '9'),
            ('1259', 'figura demons slayer', 'Figura Demons Slayer', 'img/productos/demon-slayerFigure.png', '35000', '1', '3', '3'),
            ('1260', 'juego demons slayer', 'Juego Demons Slayer', 'img/productos/demons_slayer_PS5.jpg', '30000', '1', '1', '10'),
            ('1261', 'juego forza horizon', 'Juego Forza Horizon', 'img/productos/F5Xbox.jpg', '45000', '1', '1', '8'),
            ('1262', 'juego fifa22', 'Juego Fifa22', 'img/productos/FIFA-22-PS5.png', '45000', '1', '1', '10'),
            ('1263', 'juego fifa22X', 'Juego Fifa22X', 'img/productos/fifa22Xbox.jpg', '45000', '1', '1', '8'),
            ('1264', 'figura joker', 'Figura Joker', 'img/productos/JokerFigure.jpg', '200000', '1', '3', '9'),
            ('1265', 'juego man eater', 'Juego ManEater', 'img/productos/ManEaterPs5.jpg', '45000', '1', '1', '10'),
            ('1266', 'juego mario 3d switch', 'Juego Mario 3d Switch', 'img/productos/mario3d-switch.png', '35000', '1', '1', '7'),
            ('1267', 'juego mortal kombat', 'Juego Mortal Kombat', 'img/productos/Mortal-Kombat-11-Ultimate-PS5-2.jpg', '45000', '1', '1', '10'),
            ('1268', 'juego mortal kombat', 'Juego Mortal KombatX', 'img/productos/mortalXbox.jpg', '45000', '1', '1', '8'),
            ('1269', 'consola playstation5', 'Consola Playstation 5', 'img/productos/Play5Venta.jpg', '500000', '1', '2', '10'),
            ('1270', 'Juego Battlefield 2042', 'Juego Battlefield 2042', 'img/productos/ps5-battlefield.jpeg', '45000', '1', '1', '10'),
            ('1271', 'Juego Rainbow Six', 'Juego Rainbow Six', 'img/productos/rainbow-six-siege-deluxe-year-6-ps5.jpg', '35000', '1', '1', '10'),
            ('1272', 'Juego Resident Evil 7', 'Juego Resident Evil 7', 'img/productos/ResidenPs5.png', '35000', '1', '1', '10'),
            ('1273', 'Juego Resident Evil 7X', 'Juego Resident Evil 7X', 'img/productos/ResidenXbox.png', '35000', '1', '1', '8'),
            ('1274', 'Figura Saitama', 'Figura Saitama', 'img/productos/saitamaFigure.jpg', '150000', '1', '3', '9'),
            ('1275', 'Figura Spiderman', 'Figura Spiderman', 'img/productos/spidermanHotToys.jpg', '200000', '1', '3', '9'),
            ('1276', 'Juego Splatoon', 'Juego Splatoon', 'img/productos/splatoon.png', '35000', '1', '1', '7'),
            ('1277', 'Consola Nintendo Switch', 'Consola Nintendo Switch', 'img/productos/Switch.png', '100000', '1', '2', '7'),
            ('1278', 'Figura WandaVision', 'Figura WandaVision', 'img/productos/wandavisionFigures.jpg', '150000', '1', '3', '9'),
            ('1279', 'Consola Xbox Series Halo Edition', 'Consola Xbox Series Halo Edition', 'img/productos/Xbox-Series-X-Halo-Infinite-Edition-Console.png', '300000', '1', '2', '8');
            



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
    idUsuario int not null,
    estadoPedido boolean not null,
    fecha date not null,
    paga double not null,
    
    foreign key (idLocal) references locales(idLocal),
    constraint FK_IDREPARTIDOR foreign key(idRepartidor) references Repartidores(idRepartidor),
    constraint FK_IDUSUARIO foreign key (idUsuario) references Usuarios(idUsuario)
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
