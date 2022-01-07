/**
 * Vue folders project structure:
 * Styles are stored in resources/sass/app,scss
 * All Vue files are under resources/js
 * Routes from Vue Router are in resources/js/routes.js
 * Store file for Vuex is located in resources/js/store.js
 * The file resources/js/App.vue contain the main component container of the app
 * Component are stored under resources/js/components using 3 subfolders.
 * Subfolder pages contains elements linked to Vue Router routes
 * Subfolder layouts contains common elements, like headers
 * Subfolder items contains internal page components, like cards for the kanban board
 * @author Ever Giraldo <ever.giraldo@gmail.com>
 * @since 2022-01-01
 */

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// Adding Vue
window.Vue = require('vue');
// Importing libraries
import VueRouter from 'vue-router'
import BootstrapVue from 'bootstrap-vue'
import { mapState } from 'vuex'

//Setting store for Vuex
import store from './store'

// Import Core App component
import App from './App.vue' 

// Import Routes for VueRouter
import routes from './routes'

// Import Bootstrap and BootstrapVue CSS files
import '../../node_modules/bootstrap/dist/css/bootstrap.css'
import '../../node_modules/bootstrap-vue/dist/bootstrap-vue.css'

// Make BootstrapVue and VueRouter available throughout your project
Vue.use(BootstrapVue)
Vue.use(VueRouter)

// Instancing router
const router = new VueRouter({
  routes,
  mode: 'history'
})

// Adding route guards
router.beforeEach((to,from,next) => {
  if (to.name !== 'login' && to.name !== 'signup' && !store.state.isAuthenticated) next({ name:'login'})
    else next()
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('app-component', require('./App.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store,
    router: router
});
