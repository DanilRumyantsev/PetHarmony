<template>
    <header class="header">
        <ul class="no-markers">
            <li class="li"><img src="/assets/logos/LOGO_short.svg" class="logo"></li>
            <li class="li"><router-link to="/profile" class="route"> Профиль</router-link></li>
            <li class="li"><router-link to="/categories" class="route"> Категории здоровья</router-link> </li>
            <li class="li"> Отчеты </li>
            <li class="li"><router-link to="/settings" class="route"> Настройки</router-link></li>
        </ul>
    </header>
    <div class="head">
        <h1 class="h1">Отчеты</h1>
    </div>
    <div class="left_container">
        <v-select
        label="По пользователям"
        :items="['Пользователь 1', 'Пользователь 2', 'Пользователь 3', 'Пользователь 4']"
        ></v-select>
        <v-select
        label="По категориям помощи"
        :items="['Коты, до 5 лет', 'Котята, до 2 лет', 'Щенки, до 2 лет', 'Собаки, до 7 лет']"
        ></v-select>
        <v-date-picker v-model="date"></v-date-picker>
    </div>
</template>

<style>
.left_container{
    width:400px;
}
</style>

<script>
export default {
  data() {
    return {
      date: new Date().toISOString().substr(0, 10),
    };
  }
};
</script>

