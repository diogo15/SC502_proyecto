//Cargar componentes de paginas, y agregarlos a ruticas


const home = httpVueLoader(site_url + 'js/paginas/homepage.vue');
const tienda = httpVueLoader(site_url + 'js/paginas/tienda.vue');
const acercaDe = httpVueLoader(site_url + 'js/paginas/acercaDe.vue');


const ruticas = [
    { path: '/', component: home },
    { path: '/acercaDe', component: acercaDe },
    { path: '/tienda', component: tienda }
]

const router = new VueRouter({
    routes: ruticas
});

var app = new Vue({
    router,
    data: {
        message: 'Hello Bitc!$%@!',
    },
    mounted () {
        
    }
}).$mount('#app');


