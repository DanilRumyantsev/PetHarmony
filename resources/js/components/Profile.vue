<template>
    <header class="header">
        <ul class="no-markers">
            <li class="li"><img src="/assets/logos/LOGO_short.svg" class="logo"></li>
            <li class="li">Профиль</li>
            <li class="li">Категории здоровья</li>
            <li class="li">Отчеты</li>
            <li class="li">Настройки</li>
        </ul>
    </header>

    <div class="person">
        <div class="container">
            <img src="/assets/images_pets/photo1.png" class="image">
            <div class="column">
                <p>Имя пользователя: <span class="user-name">Зоя Никифорова</span></p>
                <p>Логин: <span class="user-login">zoya_nikiforova</span></p>
                <p><--- Выйти <--- Редактировать</p>
            </div>
            <div class="column">
                <p>Телефон: <span class="user-phone">88008008888</span></p>
                <p>Почта: <span class="user-email">nikiforova@example.com</span></p>
                <p class="select">
                <v-select
                    :items="items_clinics"
                    density="compact"
                    label="Закрепленная клиника"
                ></v-select>
                </p>
            </div>
        </div>
    </div>
    
    <div class="divider"></div>

    <div class="pet">
        <div class="container">
            <img src="/assets/images_pets/pet1.png" class="image">
            <div class="column">
                <p>Имя: <span class="user-name">Пал Палыч</span></p>
                <p>Индентификатор: <span class="user-login">c200718</span></p>
                <p><--- Редактировать</p>
            </div>
            <div class="column">
                <p>Окрас: <span class="user-phone">Черный</span></p>
                <p>Дата рождения: <span class="user-email">01.06.2020</span></p>
                <p class="select">
                <v-select
                    :items="items_pets"
                    density="compact"
                    label="Категория здоровья"
                ></v-select>
                </p>
            </div>
        </div>
    </div>
</template>

<style>
body{
    background-color:#FFFFFF;
    display: flex;
    justify-content: center;
}
.header{
    background-color: #C7FFBA;
    width: 1000px;
    height: 55px;
    border-radius: 20px;
}
.no-markers {
    list-style-type: none;
    padding-right: 100px;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    text-align: center;
}
.li{
    padding-top: 10px;
    padding-left: 35px;
}
.logo {
  width: 242px; 
  height: 35px;    
}
.image {
  width:auto;
  height: auto; 
}
.person{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding-top: 45px;
}
.container{
    display: flex;
    flex-direction: row;
    /* justify-content: center; */
    align-items: center;
    text-align: left;
    justify-content: space-between; /* Распределяет колонки по ширине */
}
.column {
  flex: 1; 
  margin: 0px 50px; 
}
.user-name, .user-login, .user-phone, .user-email {
  font-weight: bold;
}
.divider {
  width: 100%;
  height: 1px;
  background-color: #ccc;
  margin: 20px 0;
}
.select{
    height:fit-content;
    margin: 0px; 
}
</style>

<script setup>
    const items_clinics = ['ул. Пушкинская, д.72', '1-ая Барикадная, д.29', 'пер. Соборный, 94б', 'ул.Казахская, д.49']
    const items_pets = ['Коты, до 5 лет', 'Котята, до 2 лет']
</script>