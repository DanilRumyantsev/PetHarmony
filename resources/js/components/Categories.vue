<script setup>
    const items_clinics = ['ул. Пушкинская, д.72', '1-ая Барикадная, д.29', 'пер. Соборный, 94б', 'ул.Казахская, д.49']
    const items_pets = ['Коты, до 5 лет', 'Котята, до 2 лет']
</script>

<template>
    <header class="header">
        <ul class="no-markers">
            <li class="li"><img src="/assets/logos/LOGO_short.svg" class="logo"></li>
            <li class="li"><router-link to="/profile"> Профиль</router-link></li>
            <li class="li"> Категории здоровья </li>
            <li class="li"><router-link to="/reports"> Отчеты</router-link></li>
            <li class="li"><router-link to="/settings"> Настройки</router-link></li>
        </ul>
    </header>
    
    <div class="body_categories">
        <h1 class="h1">Категории здоровья</h1>
        <p><v-btn class="button"
            v-bind="activatorProps"
            text="Создать"
            variant="flat"
            ></v-btn></p>
    </div>
</template>

<style>
.h1{
    color:#037247;
    margin-bottom: 25px;
    font-size: 28px;
}
.button{
    background-color: #C7FFBA;
    color: #037247;
    width: 200px;
    height: 50px;
    border-radius: 20px;
    font-size: 14px;
    margin-bottom: 15px;
}
.body_categories{
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
}
</style>