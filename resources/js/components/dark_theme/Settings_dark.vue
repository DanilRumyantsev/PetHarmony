<template class="">
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
        <p>Тема</p>
        <router-link to="/settings" class="route">
                        <v-btn class="button_dark" 
                        v-bind="activatorProps" 
                        variant="flat">
                            Светлая
                        </v-btn>
        </router-link>
        <v-btn class="button" 
        v-bind="activatorProps" 
        variant="flat">
            Темная
        </v-btn>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style>

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