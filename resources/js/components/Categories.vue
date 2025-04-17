<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import CreateCategory from './CreateCategory.vue';

onMounted(() => {
  axios.get('/api/categories').then(response => {
    categories.value = response.data;
  }).catch(error => {
    console.error('Ошибка при загрузке категорий:', error);
  });
});

const deleteCategory = (id) => {
  axios.delete(`/api/categories/${id}`).then(() => {
    categories.value = categories.value.filter(category => category.id !== id);
  }).catch(error => {
    console.error('Ошибка при удалении категории:', error);
  });
};

const categories = ref([]);

const addCategoryToList = (newCategory) => {
  categories.value.push(newCategory);
};
</script>

<template>
    <header class="header">
      <ul class="no-markers">
        <li class="li"><img src="/assets/logos/LOGO_short.svg" class="logo"></li>
        <li class="li"><router-link to="/profile" class="route"> Профиль</router-link></li>
        <li class="li"> Категории здоровья </li>
        <li class="li"><router-link to="/reports" class="route"> Отчеты</router-link></li>
        <li class="li"><router-link to="/settings" class="route"> Настройки</router-link></li>
      </ul>
    </header>
    
    <div class="head">
      <h1 class="h1">Категории здоровья</h1>
    </div>
  
  <div class="categories">
    <v-row dense>
      <v-col
        v-for="category in categories"
        :key="category.id"
        cols="12"
        md="4"
      >
        <v-card
          class="mx-auto category_card"
          width="300"
          :subtitle="`Возраст: ${category.description}`"
          :title="category.name_category"
          rounded="xl"
        >
          <template v-slot:actions>
            <v-btn @click="editCategory(category)" text="Редактировать"></v-btn>
            <v-btn @click="deleteCategory(category.id)" text="Удалить"></v-btn>
          </template>
        </v-card>
      </v-col>
    </v-row>
  </div>

  <div class="createCategory">
    <CreateCategory @category-created = "addCategoryToList" />
  </div>
  
</template>

<style scoped>
.v-card {
  margin: 5px;
}
.button_create{
    background-color: #C7FFBA;
    color: #037247;
    width: 200px;
    height: 40px;
    border-radius: 20px;
    font-size: 14px;
    margin: 25px 65px;
}
.head {
  margin: 50px auto 0 auto;
}
.categories{
  width: 1000px;
  margin: 50px auto 20px auto;
}
.v-card {
  background-color: #E8E8E8;
}
.createCategory {
  margin: 0 auto;
}
</style>