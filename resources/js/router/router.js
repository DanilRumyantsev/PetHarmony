import { createRouter, createWebHistory } from "vue-router";
import { components } from "vuetify/dist/vuetify.js";
import Profile from "../components/Profile.vue";
import Main from "../components/Main.vue";
import Categories from "../components/Categories.vue";
import EditProfile from "../components/EditProfile.vue";
import EditPet from "../components/EditPet.vue";
import Reports from "../components/Reports.vue";
import Settings from "../components/Settings.vue";
import FirstWindow from "../components/FirstWindow.vue";
import Get from "../components/Get.vue";

const routes = [
    { path: '/', component: Main},
    { path: '/profile', component: Profile},
    { path: '/edit_profile', component: EditProfile },
    { path: '/edit_pet', component: EditPet},
    { path: '/categories', component: Categories },
    { path: '/reports', component: Reports },
    { path: '/settings', component: Settings },
    { path: '/FirstWindow', component: FirstWindow },
    { path: '/get', component: Get},
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('x_xsrf_token')
  
    if (!token) {
      if (to.path === '/') {
        return next()
      }
      return next('/')
    }
  
    if (to.path === '/' && token) {
      return next('/profile')
    }

    next()
})

export default router
