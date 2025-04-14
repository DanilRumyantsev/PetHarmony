<script setup>
    import Registration from './Registration.vue';
    import Enterance from './Enterance.vue';
</script>

<template>

<div class="body_main">
    <div class="container_main">
        <img src="/assets/logos/LOGO.svg" class="image_main">
        <p class="text_main">Добро пожаловать!</p>
        <Registration />
        <Enterance />
        <router-link to="/profile"> На сайт</router-link>   
    </div>
</div>
    

</template>

<style>

.body_main{
    background: #ffffff;
    padding-top: 150px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.text{
    color: #037247;
    margin-bottom: 25px;
    font-size: 28px;
}
.container_main{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
}
.image_main {
  max-width: 350px; 
  height: auto;    
  margin-bottom: 15px; 
}

</style>