<template>
    <header class="header">
        <ul class="no-markers">
            <li class="li"><img src="/assets/logos/LOGO_short.svg" class="logo"></li>
            <li class="li"><router-link to="/profile"> Профиль</router-link></li>
            <li class="li"><router-link to="/categories"> Категории здоровья</router-link> </li>
            <li class="li"> <router-link to="/reports"> Отчеты</router-link> </li>
            <li class="li"> Настройки </li>
        </ul>
    </header>
    <div> 
        <h1 class="h1">Настройки</h1>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style>
.h1{
    color:#037247;
    margin-bottom: 25px;
    font-size: 28px;
}
</style>