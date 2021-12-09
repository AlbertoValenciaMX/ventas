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