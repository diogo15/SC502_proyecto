var app = new Vue({
    router,
    data: {
        message: 'INTO THE ZONE',
    },
    mounted () {
        if(!!localStorage.getItem('carritoLocal')){
            carrito.loadItems(JSON.parse(localStorage.getItem('carritoLocal')));
        }
    },
    components: {
        'carrito': httpVueLoader(site_url + 'js/componentes/btn-carrito.vue')
    }
}).$mount('#app');


