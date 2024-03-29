import TopPage from './pages/TopPage.vue';
import Login from './pages/Login.vue';
import ProfileCreate from './pages/ProfileCreate.vue';
import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    {
        path: '/login',
        name: 'Login',
        component: Login,
    },
    {
        path: '/top',
        name: 'TopPage',
        component: TopPage,
    },
    {
        path: '/profile_create',
        name: 'ProfileCreate',
        component: ProfileCreate,
    },
];
const router = createRouter({
    routes,
    history: createWebHistory(),
})
export default router;