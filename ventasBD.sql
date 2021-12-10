CREATE DATABASE ventas;

USE ventas;

CREATE TABLE categorias (
  id int(10) AUTO_INCREMENT NOT NULL,
  nombre varchar(20) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  constraint categoriasPk primary key (id)
) ENGINE = InnoDB;

CREATE TABLE tipoclientes (
  id int(10) AUTO_INCREMENT NOT NULL,
  nivel smallint(6) NOT NULL,
  descuento smallint(6) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  constraint tipoclientesPk primary key (id)
) ENGINE = InnoDB;

CREATE TABLE tipocompras (
  id int(10) AUTO_INCREMENT NOT NULL,
  descripcion varchar(50) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  constraint tipocomprasPk primary key (id)
) ENGINE = InnoDB;

CREATE TABLE tipovendedores (
  id int(10) AUTO_INCREMENT NOT NULL,
  descripción varchar(50) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  constraint tipovendedoresPk primary key (id)
) ENGINE = InnoDB;

CREATE TABLE promociones (
  id int(10) AUTO_INCREMENT NOT NULL,
  descripcion varchar(50) NOT NULL,
  descuento smallint(6) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  constraint promocionesPk primary key (id)
) ENGINE = InnoDB;

CREATE TABLE proveedores (
  id int(10) AUTO_INCREMENT NOT NULL,
  nombre varchar(50) NOT NULL,
  telefono varchar(10) NOT NULL,
  email varchar(320) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  constraint proveedoresPk primary key (id)
) ENGINE = InnoDB;

CREATE TABLE vendedores (
  id int(10) AUTO_INCREMENT NOT NULL,
  nombre varchar(50) NOT NULL,
  telefono varchar(10) NOT NULL,
  email varchar(320) NOT NULL,
  rfc varchar(13) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  constraint vendedoresPk primary key (id)
) ENGINE = InnoDB;

CREATE TABLE metodopagos (
  id int(10) AUTO_INCREMENT NOT NULL,
  descripcion varchar(50) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  constraint metodopagosPk primary key (id)
) ENGINE = InnoDB;

CREATE TABLE users (
  id bigint(20) AUTO_INCREMENT NOT NULL,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  email_verified_at timestamp NULL DEFAULT NULL,
  password varchar(255) NOT NULL,
  remember_token varchar(100) DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  constraint usersPk primary key (id)
) ENGINE = InnoDB;

CREATE TABLE password_resets (
  email varchar(255) NOT NULL,
  token varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  constraint pwdresetPk primary key (email)
) ENGINE = InnoDB;

CREATE TABLE productos (
  id int(10) AUTO_INCREMENT NOT NULL,
  idCategoria int(10) NOT NULL,
  nombre varchar(20) NOT NULL,
  descripcion varchar(50) NOT NULL,
  precio double(8, 2) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  constraint productosPk primary key (id),
  constraint productosFK1 foreign key (idCategoria) references categorias (id)
) ENGINE = InnoDB;

CREATE TABLE inventarios (
  idProducto int(10) NOT NULL,
  cantidad int(11) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  constraint inventariosPk primary key (idProducto),
  constraint inventariosFK1 foreign key (idProducto) references productos (id)
) ENGINE = InnoDB;

CREATE TABLE clientes (
  id int(10) AUTO_INCREMENT NOT NULL,
  idTipoCliente int(10) NOT NULL,
  nombre varchar(50) NOT NULL,
  domicilio varchar(50) NOT NULL,
  estado varchar(20) NOT NULL,
  ciudad varchar(40) NOT NULL,
  cp varchar(5) NOT NULL,
  email varchar(320) NOT NULL,
  telefono varchar(10) NOT NULL,
  rfc varchar(13) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  constraint clientesPk primary key (id),
  constraint clientesFK1 foreign key (idTipoCliente) references tipoclientes (id)
) ENGINE = InnoDB;

CREATE TABLE pedidos (
  id int(10) AUTO_INCREMENT NOT NULL,
  idProducto int(10) NOT NULL,
  idCliente int(10) NOT NULL,
  idVendedor int(10) NOT NULL,
  cantidad int(11) NOT NULL,
  subTotal double(8, 2) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  constraint pedidosPk primary key (id),
  constraint pedidosFK1 foreign key (idProducto) references productos (id),
  constraint pedidosFK2 foreign key (idCliente) references clientes (id),
  constraint pedidosFK3 foreign key (idVendedor) references vendedores (id)
) ENGINE = InnoDB;

CREATE TABLE compras (
  id int(10) AUTO_INCREMENT NOT NULL,
  idProveedores int(10) NOT NULL,
  idTipoCompra int(10) NOT NULL,
  idMetodoPago int(10) NOT NULL,
  fechaCompra date NOT NULL,
  fechaPago date NOT NULL,
  total double(8, 2) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  constraint comprasPk primary key (id),
  constraint proveedoresFK1 foreign key (idProveedores) references proveedores (id),
  constraint tipoCompraFK1 foreign key (idTipoCompra) references tipocompras (id),
  constraint metodoPagoFK2 foreign key (idMetodoPago) references metodopagos (id)
) ENGINE = InnoDB;

CREATE TABLE ventas (
  id int(10) AUTO_INCREMENT NOT NULL,
  idPedido int(10) NOT NULL,
  idTipoVenta int(10) NOT NULL,
  idMetodoPago int(10) NOT NULL,
  idPromocion int(10) NOT NULL,
  fechaCompra date NOT NULL,
  fechaPago date NOT NULL,
  total double(8, 2) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  constraint ventasPk primary key (id),
  constraint ventasFK1 foreign key (idPedido) references pedidos (id),
  constraint ventasFK2 foreign key (idTipoVenta) references tipovendedores (id),
  constraint ventasFK3 foreign key (idMetodoPago) references metodopagos (id),
  constraint ventasFK4 foreign key (idPromocion) references promociones (id)
) ENGINE = InnoDB;

CREATE TABLE facturas (
  id int(10) AUTO_INCREMENT NOT NULL,
  idVenta int(10) NOT NULL,
  fecha date NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  constraint facturasPK primary key (id),
  constraint facturaFK1 foreign key (idVenta) references ventas (id)
) ENGINE = InnoDB;

insert into categorias(nombre,created_at,updated_at)
values
       ('Anillos',now(),now()),
       ('Pulseras',now(),now()),
       ('Gargantillas',now(),now()),
       ('Esclavas',now(),now()),
       ('Collares',now(),now()),
       ('Aretes',now(),now()),
       ('Arracadas',now(),now()),
       ('Dijes',now(),now());
insert into tipoclientes (nivel,descuento,created_at,updated_at)
values
       (1,5,now(),now()),
       (2,10,now(),now()),
       (3,15,now(),now());

insert into tipocompras (descripcion,created_at,updated_at)
values
       ('Compra en efectivo',now(),now()),
       ('Transferencia bancaria',now(),now()),
       ('Compra a credito',now(),now());

insert into tipovendedores (descripción,created_at,updated_at)
values
       ('Venta en efectivo',now(),now()),
       ('Transferencia bancaria',now(),now()),
       ('Venta a credito',now(),now());

insert into promociones (descripcion,descuento,created_at,updated_at)
values
       ('Buen fin',15,now(),now()),
       ('Promocion navideña',10,now(),now());

insert into proveedores (nombre,telefono,email,created_at,updated_at)
values
       ('David Pedraza','9518071223','davidP@gmail.com',now(),now()),
       ('Amalia Bermudez','4613650971','aBermudez@gmail.com',now(),now()),
       ('Samuel Saura','2441021436','samuelsau@gmail.com',now(),now()),
       ('Angelica Juarez','3128567774','angijuarez@gmail.com',now(),now()),
       ('Abelardo Nevado','4621021436','abeNe12@gmail.com',now(),now()),
       ('Laura Esteban','4619372369','lauLE23@gmail.com',now(),now()),
       ('Silvia Barea','4618594163','davidP@gmail.com',now(),now());

insert into vendedores (nombre,telefono,email,rfc,created_at,updated_at)
values
       ('Ramona Cervantes','4612089060','ramon12@gmail.com','CERA770707PK6',now(),now()),
       ('Ariana Serra','4618938644','arigameplays@gmail.com','SEAR990412U2A',now(),now()),
       ('Alberto Segovia','4619383846','beto@gmail.com','SEAL990412H3A',now(),now());

insert into metodopagos (descripcion,created_at,updated_at)
values
       ('Pago en efectivo',now(),now()),
       ('Tarjeta debito',now(),now()),
       ('Tarjeta credito',now(),now());

insert into productos (idCategoria,nombre,descripcion,precio,created_at,updated_at)
values
       (1,'Anillo Titanio','Anillo de Zirconias',429.00,now(),now()),
       (1,'Anillo Cuadrado','Anillo acero inoxidable',144.59,now(),now()),
       (7,'Arracadas Acero','Cierre de Mariposa',349.00,now(),now());

insert into clientes (idTipoCliente,nombre,domicilio,estado,ciudad,cp,email,telefono,rfc,created_at,updated_at)
values
       (1,'Gracia Carranza','22812 Karli Oval','Guanajuato','Salamanca','36700','graciaCA@gmail.com','4620665039','CAGR010913KB9',now(),now()),
       (3,'Yolanda Mendoza','1227 Carrie Island','Guanajuato','Celaya','38020','yolisME@gmail.com','4614625524','CAGR010913KB9',now(),now());

insert into pedidos (idProducto,idCliente,idVendedor,cantidad,subTotal,created_at,updated_at)
values
       (1,1,1,2,858.000,now(),now()),
       (2,1,1,1,144.59,now(),now()),
       (3,2,2,1,349.00,now(),now());

insert into compras (idProveedores,idTipoCompra,idMetodoPago,fechaCompra,fechaPAgo,total,created_at,updated_at)
values
       (1,1,1,current_date(),current_date(),769.34,now(),now()),
       (3,2,2,current_date(),current_date(),1300.00,now(),now()),
       (6,3,3,current_date(),current_date(),1460.00,now(),now());

insert into compras (idProveedores,idTipoCompra,idMetodoPago,fechaCompra,fechaPAgo,total,created_at,updated_at)
values
       (1,1,1,current_date(),current_date(),769.34,now(),now()),
       (3,2,2,current_date(),current_date(),1300.00,now(),now()),
       (6,3,3,current_date(),current_date(),1460.00,now(),now());
insert into ventas (idPedido,idTipoVenta,idMetodoPago,idPromocion,fechaCompra,fechaPago,total,created_at,updated_at)
values
       (1,1,1,2,current_date(),current_date(),772.2,now(),now());

insert into facturas (idVenta,fecha,created_at,updated_at)
values (1,current_date(),now(),now());