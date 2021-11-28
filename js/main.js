var app = new Vue({
    router,
    data: {
        message: 'INTO THE ZONE',
        login: false
    },
    mounted () {
        if(!!localStorage.getItem('carritoLocal')){
            carrito.loadItems(JSON.parse(localStorage.getItem('carritoLocal')));
        }
    },
    components: {
        'carrito': httpVueLoader(site_url + 'js/componentes/btn-carrito.vue'),
        'login': httpVueLoader(site_url + 'js/paginas/login.vue'),
    }
}).$mount('#app');


