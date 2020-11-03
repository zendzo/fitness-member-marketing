require('./bootstrap');

import { App,plugin } from '@inertiajs/inertia-vue'
import Vue from 'vue'

Vue.config.devtools = true

Vue.use(plugin)

Vue.prototype.$route = (...args) => route(...args).url()

const el = document.getElementById('app')

if (el) {
    new Vue({
        render: h => h(App, {
            props: {
                initialPage: JSON.parse(el.dataset.page),
                resolveComponent: name => import(`./Pages/${name}`).then(module => module.default),
            },
        }),
    }).$mount(el)
}