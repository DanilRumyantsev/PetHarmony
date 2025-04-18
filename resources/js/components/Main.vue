<script setup>
    import Registration from './Registration.vue';
    import Enterance from './Enterance.vue';
</script>

<template>

<div class="body_main">
    <v-card class="container_main">
        <img src="/assets/logos/LOGO.svg" class="image_main">
        <p class="text_main">Добро пожаловать!</p>
        <Registration />
        <Enterance />
    </v-card>
</div>


</template>

<style scoped>

body {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

.body_main{
    background: #ffffff;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: auto;
}
.text_main{
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
    padding: 100px;
}
.image_main {
  max-width: 350px;
  height: auto;
  margin-bottom: 15px;
}

</style>
