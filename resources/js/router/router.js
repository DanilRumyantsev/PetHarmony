import { createRouter, createWebHistory } from "vue-router";
import { components } from "vuetify/dist/vuetify.js";
import Profile from "../components/Profile.vue";
import Main from "../components/Main.vue";
import Categories from "../components/Categories.vue";
import EditProfile from "../components/EditProfile.vue";
import EditPet from "../components/EditPet.vue";
import Reports from "../components/Reports.vue";
import Settings from "../components/Settings.vue";

const routes = [
    { path: '/', component: Main},
    { path: '/profile', component: Profile },
    { path: '/edit_profile', component: EditProfile },
    { path: '/edit_pet', component: EditPet},
    { path: '/categories', component: Categories },
    { path: '/reports', component: Reports },
    { path: '/settings', component: Settings },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router