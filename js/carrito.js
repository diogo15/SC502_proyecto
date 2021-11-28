var carrito = {
    state: {
        items: [],
        total: 0
    },
    addItem (newProduct) {

        if(!newProduct.hasOwnProperty('quantity')){
            newProduct["quantity"] = 1;
        }

        let currentProduct = this.state.items.filter(item => item.idProducto == newProduct.idProducto);
        let found = currentProduct.length > 0;
        
        if (!found) {
            var addProduct = Object.assign({}, newProduct);
            this.state.items.push(addProduct);
        } else {
            currentProduct[0].quantity += 1;
        }

        localStorage.setItem('carritoLocal', JSON.stringify(this.state.items)); 
        this.getTotal();
    },
    removeItem(id) {
        let id2Delete = this.state.items.findIndex(item => item.idProducto == id);
        this.state.items.splice(id2Delete, 1);
    },
    clearItems () {
        this.state.items = '';
    },
    loadItems(localItems){
        this.state.items = localItems;
        this.getTotal();
    },
    getTotal: function () { 
        var resultado=0;
        for(var i=0;  this.state.items.length>i;i++){
          resultado+= this.state.items[i].precioVenta* this.state.items[i].quantity;
        }
        this.state.total=resultado;
      }
}