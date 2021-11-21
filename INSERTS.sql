

INSERT INTO `paises` (`idPais`, `codPais`, `nombrePais`) VALUES (NULL, '406', 'Costa Rica');
INSERT INTO `locales` (`idLocal`, `nombreLocal`, `direccion`, `idPais`, `idProvincia`, `idEmpleado`) VALUES (NULL, 'san jose', 'sanjo', '1', '1', '1');
INSERT INTO `locales` (`idLocal`, `nombreLocal`, `direccion`, `idPais`, `idProvincia`, `idEmpleado`) VALUES (NULL, 'san pedro', 'san pedro', '1', '1', '1');
INSERT INTO `locales` (`idLocal`, `nombreLocal`, `direccion`, `idPais`, `idProvincia`, `idEmpleado`) VALUES (NULL, 'curri', 'curri', '1', '1', '1');
INSERT INTO `empleados` (`idEmpleado`, `cedulaEmpleado`, `nombreEmpleado`, `apellidoEmpleado`) VALUES (NULL, '114180039', 'luis', 'ramirez');


INSERT INTO `marcas` (`idMarca`, `nombreMarca`) VALUES (NULL, 'funko');
INSERT INTO `marcas` (`idMarca`, `nombreMarca`) VALUES (NULL, 'reddragon');
INSERT INTO `marcas` (`idMarca`, `nombreMarca`) VALUES (NULL, 'amazon');


INSERT INTO `productos` (`idProducto`, `codBarras`, `nombreProducto`, `descripProducto`, `url_imagen`, `precioVenta`, `idLocal`, `idCategoria`, `idMarca`) VALUES (NULL, '1232', 'Funko Loki', 'Funko Loki', 'img/productos/loki.jpg', '8000', '1', '3', '1');
INSERT INTO `productos` (`idProducto`, `codBarras`, `nombreProducto`, `descripProducto`, `url_imagen`, `precioVenta`, `idLocal`, `idCategoria`, `idMarca`) VALUES (NULL, '1233', 'Funko Vader', 'Funko Vader', 'img/productos/vader.jpg', '8000', '1', '3', '1');
INSERT INTO `productos` (`idProducto`, `codBarras`, `nombreProducto`, `descripProducto`, `url_imagen`, `precioVenta`, `idLocal`, `idCategoria`, `idMarca`) VALUES (NULL, '1234', 'Funko Navas', 'Funko Navas', 'img/productos/navas.jpg', '8000', '1', '3', '2');
INSERT INTO `productos` (`idProducto`, `codBarras`, `nombreProducto`, `descripProducto`, `url_imagen`, `precioVenta`, `idLocal`, `idCategoria`, `idMarca`) VALUES (NULL, '1235', 'Funko Navas', 'Funko Deathpool', 'img/productos/navas.jpg', '8000', '1', '3', '2');
