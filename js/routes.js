//Cargar componentes de paginas, y agregarlos a ruticas

const home = httpVueLoader(site_url + 'js/paginas/homepage.vue');
const tienda = httpVueLoader(site_url + 'js/paginas/tienda.vue');
const acercaDe = httpVueLoader(site_url + 'js/paginas/acercaDe.vue');
const facturar = httpVueLoader(site_url + 'js/paginas/facturar.vue');
const login     = httpVueLoader(site_url + 'js/paginas/login.vue');
const product     = httpVueLoader(site_url + 'js/paginas/product.vue');
const registro     = httpVueLoader(site_url + 'js/paginas/registro.vue');
const marca     = httpVueLoader(site_url + 'js/paginas/marca.vue');
const categoria     = httpVueLoader(site_url + 'js/paginas/categoria.vue');

const ruticas = [
    { path: '/', component: home },
    { path: '/product/:pid', component: product },
    { path: '/categoria/:cid', component: categoria },
    { path: '/marca/:mid', component: marca },
    { path: '/acercaDe', component: acercaDe },
    { path: '/tienda', component: tienda },
    { path: '/facturar', component: facturar },
    { path: '/login',       component: login },
    { path: '/registro',       component: registro }
    
]

const router = new VueRouter({
    routes: ruticas
});

/**
 * 
 router.beforeEach((to, from, next) => {
     if (to.name !== 'Login' && !isAuthenticated) { 
         next({ name: 'Login' });
        }else{
            next();
        }     
    })

*/