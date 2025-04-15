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
        Тема
        <v-switch label="Темная" inset></v-switch>
            <v-btn class="button" 
            v-bind="activatorProps" 
            variant="flat">
                Светлая
            </v-btn>
            <router-link to="/settings_dark" class="route">
                        <v-btn class="button_dark" 
                        v-bind="activatorProps" 
                        variant="flat">
                            Темная
                        </v-btn>
            </router-link>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style>

</style>