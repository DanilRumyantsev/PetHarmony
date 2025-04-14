<template>
    <header class="header">
        <ul class="no-markers">
            <li class="li"><img src="/assets/logos/LOGO_short.svg" class="logo"></li>
            <li class="li">Профиль</li>
            <li class="li"><router-link to="/categories"> Категории здоровья</router-link> </li>
            <li class="li"><router-link to="/reports"> Отчеты</router-link></li>
            <li class="li"><router-link to="/settings"> Настройки</router-link></li>
        </ul>
    </header>

    <div class="person">
        <router-link to="/"> Выход</router-link>
        <h1 class="h1">Профиль</h1>
        <div class="container_profile">
            <img src="/assets/images_pets/photo1.png" class="image">
            <div class="column">
                <p>Имя пользователя: <span class="bold">Зоя Никифорова</span></p>
                <p>Логин: <span class="bold">zoya_nikiforova</span></p>
                <p>  
                    <v-btn class="button_mini"
                        v-bind="activatorProps"
                        text="Выйти"
                        variant="flat"
                    ></v-btn>
                    <span>
                    <v-btn class="button_mini"
                        v-bind="activatorProps"
                        text="Редактировать"
                        variant="flat"
                    ></v-btn>
                    </span>
                </p>
            </div>
            <div class="column">
                <p>Телефон: <span class="bold">88008008888</span></p>
                <p>Почта: <span class="bold">nikiforova@example.com</span></p>
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
        <div class="container_profile">
            <img src="/assets/images_pets/pet1.png" class="image">
            <div class="column">
                <p>Имя: <span class="bold">Пал Палыч</span></p>
                <p>Индентификатор: <span class="bold">c200718</span></p>
                <p><v-btn class="button_mini"
                    v-bind="activatorProps"
                    text="Редактировать"
                    variant="flat"
                ></v-btn></p>
            </div>
            <div class="column">
                <p>Окрас: <span class="bold">Черный</span></p>
                <p>Дата рождения: <span class="bold">01.06.2020</span></p>
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

.body_profile{
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
.h1{
    color:#037247;
    margin-bottom: 25px;
    font-size: 28px;
}
.image_profile {
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
.container_profile{
    display: flex;
    flex-direction: row;
    align-items: center;
    text-align: left;
    justify-content: space-between;
    width: 1000px;
}
.column {
  flex: 1; 
  margin: 0px 50px; 
}
.bold {
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
.button_mini{
    background-color: #EAFFEA;
    color: #037247;
    width: fit;
    height: 35px;
    border-radius: 20px;
    font-size: 10px;
    /* margin-bottom: 15px; */
}
.button_div{
    display: flex;
    justify-content: center;
}
</style>

<script setup>
    const items_clinics = ['ул. Пушкинская, д.72', '1-ая Барикадная, д.29', 'пер. Соборный, 94б', 'ул.Казахская, д.49']
    const items_pets = ['Коты, до 5 лет', 'Котята, до 2 лет']
</script>