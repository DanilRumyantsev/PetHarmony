<template>
    
    <div class="container">
        <img src="/assets/logos/LOGO.svg" class="image">
        <p class="text">Добро пожаловать!</p>
        <!-- <button class="button" link="">Вход</button>
        <button class="button" link="">Регистрация</button> -->
        <v-btn class="button">Вход</v-btn>
        <v-btn class="button">Регистрация</v-btn>
    </div>
    
</template>

<style>
html, body{
    background: #ffffff;
    height: 100%;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}
.text{
    color: #037247;
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
.container{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
}
.image {
  max-width: 350px; 
  height: auto;    
  margin-bottom: 15px; 
}
</style>