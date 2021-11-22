//Cargar componentes de paginas, y agregarlos a ruticas


const home = httpVueLoader(site_url + 'js/paginas/homepage.vue');
const tienda = httpVueLoader(site_url + 'js/paginas/tienda.vue');
const acercaDe = httpVueLoader(site_url + 'js/paginas/acercaDe.vue');
const facturar = httpVueLoader(site_url + 'js/paginas/facturar.vue');


const ruticas = [
    { path: '/', component: home },
    { path: '/acercaDe', component: acercaDe },
    { path: '/tienda', component: tienda },
    { path: '/facturar', component: facturar }
]

const router = new VueRouter({
    routes: ruticas
});

var app = new Vue({
    router,
    data: {
        message: 'INTO THE ZONE',
    },
    mounted () {
        
    }
}).$mount('#app');


