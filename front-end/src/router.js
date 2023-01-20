import { createRouter, createWebHistory } from 'vue-router'
import HomeView from './views/HomeView.vue'
import SinglePageView from './views/SinglePageView.vue'

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeView
        },
        {
            path: '/show/:slug',
            name: 'single-page',
            component: SinglePageView
        },
    ]
})

export { router }