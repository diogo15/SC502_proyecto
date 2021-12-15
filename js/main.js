Vue.use(VueMeta, {
    refreshOnceOnNavigation: true
});

Vue.use(VueObserveVisibility);

var app = new Vue({
    router,
    metaInfo: {
        title: 'Inicio',
        titleTemplate: 'Into The Zone - %s'
    },
    data: {
        message: 'INTO THE ZONE',
        login: false,
        showModal: false
    },
    mounted () {
        if(!!localStorage.getItem('carritoLocal')){
            carrito.loadItems(JSON.parse(localStorage.getItem('carritoLocal')));
        }
    },
    components: {
        'carrito': httpVueLoader(site_url + 'js/componentes/btn-carrito.vue'),
        'btn-login': httpVueLoader(site_url + 'js/componentes/btn-login.vue'),
        'modal': httpVueLoader(site_url + 'js/componentes/modal.vue'),
        'login': httpVueLoader(site_url + 'js/paginas/login.vue'),
        'myfooter': httpVueLoader(site_url + 'js/componentes/footer.vue')        
    }
}).$mount('#app');


