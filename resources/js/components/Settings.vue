<template>
    <header class="header">
        <ul class="no-markers">
            <li class="li"><img src="/assets/logos/LOGO_short.svg" class="logo"></li>
            <li class="li"><router-link to="/profile" class="route"> Профиль</router-link></li>
            <li class="li"><router-link to="/categories" class="route"> Категории здоровья</router-link> </li>
            <li class="li"> <router-link to="/reports" class="route"> Отчеты</router-link> </li>
            <li class="li"> Настройки </li>
        </ul>
    </header>
    <div class="head">
        <h1 class="h1">Настройки</h1>
    </div>
    <div>
        
        <!-- <div class="switcher"> Светлая  </div> -->

        <!-- <v-switch @click.prevent="toggleDark" label="Темная" inset></v-switch> -->
        <button @click="toggleDark()" class="button_dark">
            Темная тема
        </button>
    </div>
    <div>
    <button @click="changeFont" class="button">Сменить шрифт</button>
    <p :style="{ fontFamily: currentFont }">Вот так будет выглядить шрифт в Вашем профиле.</p>
  </div>

</template>

<script setup>
import { useDark, useToggle } from "@vueuse/core";

const isDark = useDark();
const toggleDark = useToggle(isDark);

</script>
<script>

import { mapGetters } from 'vuex';

export default {
  computed: {
    ...mapGetters(['currentFont'])
  },
  data() {
    return {
      fonts: ['Arial', 'Courier New', 'Franklin Gothic Medium', 'Georgia', 'Sans'] // Список доступных шрифтов
    };
  },
  methods: {
    changeFont() {
      const currentIndex = this.fonts.indexOf(this.currentFont);
      const nextIndex = (currentIndex + 1) % this.fonts.length;
      this.$store.dispatch('changeFont', this.fonts[nextIndex]);
    }
  }
};
</script>
<style>
.dark body {
  background: #0B2F21;
  color: #EAFFEA;
}
.dark .header  {
    background: #037247; 
    color: #037247;
    border-radius: 20px; 
}
.dark .route{
    color: #037247;
}
.dark .li {
    filter: invert(42%) sepia(61%) saturate(7500%) hue-rotate(86deg) brightness(100%) contrast(79%);
}
.dark .h1 {
    color: #C7FFBA;
}
.dark .v-date-picker {
    background-color: #0B2F21;
    color: #EAFFEA;
}
.dark .image_main{
    filter: invert(42%) sepia(61%) saturate(7500%) hue-rotate(86deg) brightness(100%) contrast(79%);
}
.dark .text_main{
    filter: invert(42%) sepia(61%) saturate(7500%) hue-rotate(86deg) brightness(100%) contrast(79%);
}
/* .dark, .container_main{
   background-color: #0B2F21; 
} */
 .dark .v-card {
    background-color: #037247;
    color: #EAFFEA;
 }
.dark .registration{
    background-color: #037247;
    color: #EAFFEA;
}
.dark .enterance{
    background-color: #037247;
    color: #EAFFEA;
}
.dark .v-form *{
    background-color: #037247;
    color: #EAFFEA;
}
.dark .v-btn{
    background-color: #037247; 
    color: #EAFFEA;
}
.dark .category_card{
    background-color: #0B2F21;
    box-shadow: 0px 0px 10px #C7FFBA;
    color: #EAFFEA;
}
.dark .container_profile {
    box-shadow: 0px 0px 10px #C7FFBA;
}
.dark .container_pet {
    box-shadow: 0px 0px 10px #C7FFBA;
}
.button_dark{
     background-color: #037247;
     color: #C7FFBA;
     width: 200px;
     height: 50px;
     border-radius: 20px;
     font-size: 14px;
     margin-bottom: 15px;
 }
</style>
