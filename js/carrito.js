var carrito = {
    state: {
        items: []
    },
    addItem (newProduct) {
        //create copy from product
        let product = Object.assign({}, newProduct);
        product["quantity"] = 1;
        let found = false;
        let index = 0;
        let q = 0;

        for(let i=0; i < this.state.items.length; i++){            
            if(this.state.items[i].idProducto == product.idProducto){
                found = true;
                index = i;
                q = this.state.items[i].quantity;
            }
        }
        
        if(found){
            this.state.items.splice(index, 1);
            product["quantity"] = q + 1;
            this.state.items.push(product); 
        }else{
            console.log(product);
            this.state.items.push(product);
        }

        localStorage.setItem('carritoLocal', JSON.stringify(this.state.items));      
        
    },
    clearItems () {
        this.state.items = '';
    },
    loadItems(localItems){
        this.state.items = localItems;
    }
}