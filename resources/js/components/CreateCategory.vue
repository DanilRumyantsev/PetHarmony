<template>
    <v-dialog max-width="400">
      <template v-slot:activator="{ props: activatorProps }">
        <v-btn
          class="button"
          density="compact"
          icon="mdi-plus"
          v-bind="activatorProps"
          text="Создание категории"
          variant="flat"
        ></v-btn>
      </template>
  
      <template v-slot:default="{ isActive }">
        <v-card title="Создание категории">
          <div class="container">
            <v-form @submit.prevent="addCategory">
              <v-sheet class="mx-auto" width="350">
                <v-text-field
                  v-model="nameCategory"
                  label="Название категории"
                  required
                ></v-text-field>
              </v-sheet>
  
              <v-sheet class="mx-auto" width="350">
                <v-textarea
                  v-model="description"
                  label="Описание"
                ></v-textarea>
              </v-sheet>
              </v-form>
          </div>
  
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn text="Подтвердить" @click="isActive.value = false;" @click.prevent="addCategory"></v-btn>
            <v-btn text="Закрыть" @click="isActive.value = false"></v-btn>
          </v-card-actions>
        </v-card>
      </template>
    </v-dialog>
  </template>
  
  <script setup>
  import axios from 'axios';
  import { ref } from 'vue';

  const emit = defineEmits(['category-created']);
  
  const nameCategory = ref('');
  const description = ref('');
  
  const addCategory = () => {
    axios.post('/api/categories', {
      name_category: nameCategory.value,
      description: description.value
    }).then(response => {
      console.log('Категория добавлена:', response.data);
      emit('category-created', response.data);
      nameCategory.value = '';
      description.value = '';
    }).catch(error => {
      console.error('Ошибка при добавлении категории:', error);
    });
  };
  </script>
  
  <style scoped>
  .button {
    background-color: #C7FFBA;
    color: #037247;
    font-size: 14px;
    margin-bottom: 15px;
  }
  </style>