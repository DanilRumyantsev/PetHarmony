<template>
    <header class="header">
        <ul class="no-markers">
            <li class="li"><img src="/assets/logos/LOGO_short.svg" class="logo"></li>
            <li class="li">Профиль</li>
            <li class="li"><router-link to="/categories" class="route"> Категории здоровья</router-link> </li>
            <li class="li"><router-link to="/reports" class="route"> Отчеты</router-link></li>
            <li class="li"><router-link to="/settings" class="route"> Настройки</router-link></li>
        </ul>
    </header>
    <div class="head">
        <h1 class="h1">Профиль</h1>
    </div>
    
    <div class="person">  
        <div class="container_profile">
            <img src="/assets/images_pets/icon_person.svg" class="image">
            <div class="column">
                <p>Имя пользователя: <span class="bold">{{ user.name }}</span></p>
                <p>Почта: <span class="bold">{{ user.email }}</span></p>
                <v-btn
                @click.prevent="logout_button" 
                class="button_mini"
                text="Выйти"
                variant="flat"
                ></v-btn>
                <v-btn
                class="button_mini"
                text="Редактировать"
                variant="flat"
                ></v-btn>
            </div>
            <div class="column">
                <p>Телефон: <span class="bold">{{ user.phone || 'Не указан' }}</span></p>
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

    <div v-for="pet in pets" :key="pet.id_pet" class="pet">
      <div class="container_pet">
        <img src="/assets/images_pets/icon_pet.svg" class="image" />
        <div class="column">
          <p>Имя: <span class="bold">{{ pet.name_pet }}</span></p>
          <p>Идентификатор: <span class="bold">{{ pet.id_pet }}</span></p>
          <p>
            <v-btn class="button_mini" text="Редактировать" variant="flat"></v-btn>
            <span>
              <HealthRecord />
            </span>
          </p>
        </div>
        <div class="column">
          <p>Окрас: <span class="bold">{{ pet.color }}</span></p>
          <p>Дата рождения: <span class="bold">{{ pet.birth_date }}</span></p>
          <p>Категория: <span class="bold">{{ getCategoryName(pet.category_id) }}</span></p>
        </div>
      </div>
    </div>
    <div class="pet__add">
        <CreatePet />
    </div>
    <v-file-upload clearable density="compact" variant="compact"></v-file-upload>



</template>

<style>
body {
    width: 1000px;
    margin: 0 auto;
}
.route{
    color: #037247;
}
.body_profile{
    display: flex;
    justify-content: center;
}
.header{
    margin: 10px auto;
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
.head{
  display: flex;
  width: 1000px;
  justify-content: center; 
  align-items: center;
  margin: 25px auto 0 auto;
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
    padding-top: 25px;
}
.pet {
    margin: 0 auto;
}
.container_profile{
    display: flex;
    width: 1000px;
    flex-direction: row;
    align-items: center;
    text-align: left;
    justify-content: space-between;
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0 3px 10px #E8E8E8;
}
.container_pet {
    display: flex;
    width: 1000px;
    flex-direction: row;
    align-items: center;
    text-align: left;
    justify-content: space-between;
    margin: 10px 0;
    padding: 10px;
    box-shadow: 0 3px 10px #E8E8E8;
    border-radius: 10px;
}
.column {
  flex: 1;
  margin: 0px 50px;
}
.bold {
  font-weight: bold;
}
.divider {
  width: 1000px;
  height: 1px;
  background-color: #ccc;
  margin: 20px auto 5px auto;
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
    margin-right: 5px;
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
.button_div{
    display: flex;
    justify-content: center;
}
.pet__add {
    text-align: center;
    margin: 5px auto;
}
</style>

<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue';
import router from '../router/router';
import Cookies from 'js-cookie';
import HealthRecord from './HealthRecord.vue';
import CreatePet from './CreatePet.vue';
import Header from './Header.vue';

const items_clinics = ['ул. Пушкинская, д.72', '1-ая Барикадная, д.29', 'пер. Соборный, 94б', 'ул.Казахская, д.49'];
const user = ref({});
const pets = ref([]);
const categories = ref([]);
const getCategoryName = (id) => {
  const category = categories.value.find(cat => cat.id === id)
  return category ? category.name_category : 'Неизвестно'
}

const logout_button = () => {
  axios.post('/logout').then(response => {
    console.log('Logout successful');
    localStorage.removeItem('x_xsrf_token');
    router.push('/');
  }).catch(error => {
    console.error('Ошибка при logout:', error.response);
  });
};

onMounted(() => {
  axios.get('/api/user').then(response => {
    user.value = response.data;
  }).catch(error => {
    console.error('Ошибка при загрузке данных пользователя:', error);
  });
  axios.get('/api/pets').then(response => {
    pets.value = response.data
  }).catch(error => {
    console.error('Ошибка при загрузке животных:', error)
  })
  axios.get('/api/categories').then(response => {
    categories.value = response.data
  })
});
</script>