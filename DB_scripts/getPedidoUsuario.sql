DELIMITER $$
create procedure spGetUsuarioPedido(in usuario int)
begin
	SELECT pedidos.estadoPedido, pedidos.fecha,
			detallepedidos.numLinea,  productos.nombreProducto, 
            detallepedidos.cantidad, detallepedidos.totalLinea, pedidos.paga
    from Pedidos, Productos, detallepedidos, usuarios 
		where usuarios.idUsuario = usuario 
        AND productos.idProducto = detallepedidos.idProducto
        AND pedidos.idUsuario = usuarios.idUsuario;
end;
$$