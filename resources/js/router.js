import TopPage from './pages/TopPage.vue';
import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    {
        path: '/',
        name: 'TopPage',
        component: TopPage,
    },
];
const router = createRouter({
    routes,
    history: createWebHistory(),
})
export default router;