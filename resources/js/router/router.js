import { createRouter, createWebHistory } from "vue-router";
import { components } from "vuetify/dist/vuetify.js";
import Profile from "../components/Profile.vue";
import Main from "../components/Main.vue";

const routes = [
    { path: '/', component: Main},
    { path: '/profile', component: Profile}
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router