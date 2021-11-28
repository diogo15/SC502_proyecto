drop database if exists WebPage;
create database WebPage;

drop user if exists admin_user;
create user 'admin_user'@'%' identified by '@Encrypto23';
grant all privileges on WebPage.* to 'admin_user'@'%';
flush privileges;

use WebPage;

/*
	usuarios	X
	empleados	X
    proveedores	X
    facturaProveedores
    detalleFacturaProveedor
    productos
    entregas
    locales
    categorias	X
    marcas		X
    inventario
    clientes
    repartidor
    facturaCliente
    detallefacturaCliente
    paises		X
    provincias	X
    
*/

create table categorias(
	idCategoria int primary key auto_increment not null,
    nombreCategoria varchar(50) not null,
    
    unique key idCategoria(idCategoria)
);

insert into categorias(nombreCategoria) values 
	(	'VIDEOJUEGOS'	), 
    (	'CONSOLAS'	),
    (	'FIGURAS'	),
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
            ('amazon');
            
insert into marcas(nombreMarca) values 
	(	'NINTENDO'	), 
    (	'XBOX'	);

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
    /*
    direccion varchar(200) not null,
    
    idRol int not null,
    idPais int not null,
    idProvincia int not null,
    
    unique key idUsuario(idUsuario),
    constraint FK_IDROL foreign key (idRol) references roles(idRol),
    foreign key (idPais) references paises(idPais),
    constraint FK_IDPROVINCIA foreign key (idProvincia) references provincias(idProvincia)
    */
);

INSERT INTO usuarios (nombreUser, apellido1Usuario, apellido2Usuario, passwordUsuario, mailUsuario)
	values 	('Fabián', 'Madriz', 'Villalta', md5(12345), 'fabimv23@gmail.com');

create table empleados(
	idEmpleado int primary key auto_increment not null,
    cedulaEmpleado int unique key not null,
    nombreEmpleado varchar(50) not null,
    apellidoEmpleado varchar(50) not null
);

INSERT INTO `empleados` (`cedulaEmpleado`, `nombreEmpleado`, `apellidoEmpleado`) 
	VALUES ('114180039', 'luis', 'ramirez');

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
    telefono int null,
    email varchar(50) null
);

drop table if exists R_LocProv;
create table R_LocProv(

    idLocal int not null,
    idProveedor int not null,
    
    constraint FK_IDLOCAL foreign key(idLocal) references Locales(idLocal),
    constraint FK_IDPROVEEDOR foreign key(idProveedor) references Proveedores(idProveedor),
    
    primary key(idLocal, idProveedor)
);

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
            ('1234', 'Funko Navas', 'Funko Navas', 'img/productos/navas.jpg', '8000', '1', '3', '2'),
            ('1235', 'Funko Navas', 'Funko Deathpool', 'img/productos/navas.jpg', '8000', '1', '3', '2');

drop table if exists repartidores;
create table repartidores(
	idRepartidor int primary key auto_increment not null,
    nombreRepartidor varchar(30) not null,
    apellidoRepartidor varchar(30) not null,
    telefono int null,
    email varchar(30) null
);

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
