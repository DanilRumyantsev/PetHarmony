<template>
    <header class="header">
        <ul class="no-markers">
            <li class="li"><img src="/assets/logos/LOGO_short.svg" class="logo"></li>
            <li class="li">Профиль</li>
            <li class="li">Категории помощи</li>
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
            </div>
            <div class="column">
            <p>Телефон: <span class="user-phone">88008008888</span></p>
            <p>Почта: <span class="user-email">nikiforova@example.com</span></p>
            </div>
        </div>
        <div class="exit-edit">
            <p>Выйти</p><p>Редактировать</p>
        </div>
        <div class="divider"></div>
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
    text-align: center;
    justify-content: space-between; /* Распределяет колонки по ширине */
}
.column {
  flex: 1; 
  margin: 0 10px; 
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
.exit-edit{
    width: 1000px;
    height:fit-content;
    display: flex;
    justify-content: space-between;
    margin: 10px 25px 0px 25px;
}
</style>