Vue.use(VueMeta, {
    refreshOnceOnNavigation: true
});

var app = new Vue({
    router,
    metaInfo: {
        title: 'Inicio',
        titleTemplate: 'Into The Zone - %s'
    },
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


