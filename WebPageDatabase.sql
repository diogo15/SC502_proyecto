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

create table marcas(
	idMarca int primary key auto_increment not null,
    nombreMarca varchar(50) not null,
    
    unique key idMarca(idMarca)
);

create table paises(
	idPais int primary key auto_increment not null,
    codPais varchar(4) not null,
    nombrePais varchar(50) not null
);

create table provincias(
	idProvincia int primary key auto_increment not null,
    nombreProvincia varchar(50) not null,
    
    idPais int not null,
    
    constraint FK_IDPAIS foreign key(idPais) references paises(idPais)
);

/* Creación de los usuarios que pueden logearse */
/*  */

create table roles(
	idRol int primary key NOT NULL AUTO_INCREMENT,
    rol VARCHAR(15) NULL,
	rolInfo VARCHAR(30) NOT NULL,
	rolStatus Boolean,
    
	unique key idRol(idRol)
);

create table usuarios(
	idUsuario int primary key auto_increment not null,
    nombreUser varchar(30) not null,
    apellido1Usuario varchar(30) not null,
    apellido2Ususario varchar(30) not null,
    passwordUsuario varchar(255) not null,
    mailUsuario varchar(50) not null,
    direccion varchar(200) not null,
    
    idRol int not null,
    idPais int not null,
    idProvincia int not null,
    
    unique key idUsuario(idUsuario),
    constraint FK_IDROL foreign key (idRol) references roles(idRol),
    foreign key (idPais) references paises(idPais),
    constraint FK_IDPROVINCIA foreign key (idProvincia) references provincias(idProvincia)
);

create table empleados(
	idEmpleado int primary key auto_increment not null,
    cedulaEmpleado int unique key not null,
    nombreEmpleado varchar(50) not null,
    apellidoEmpleado varchar(50) not null
);

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