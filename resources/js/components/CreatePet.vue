<template>
    <v-dialog v-model="dialog" max-width="400">
      <template v-slot:activator="{ props: activatorProps }">
        <v-btn
          class="button"
          density="compact"
          icon="mdi-plus"
          v-bind="activatorProps"
          text="Создание питомца"
          variant="flat"
        ></v-btn>
      </template>
  
      <v-card title="Создание питомца">
        <div class="container">
          <v-form @submit.prevent="addPet">
            <v-sheet>
              <p>Фотография питомца</p>
              <v-img
                v-if="imagePreview"
                :src="imagePreview"
                aspect-ratio="1/1"
                cover
              ></v-img>
            </v-sheet>
            <v-sheet class="mx-auto" width="350">
              <v-text-field
                v-model="name"
                label="Имя питомца"
                required
              ></v-text-field>
            </v-sheet>
  
            <v-sheet class="mx-auto" width="350">
              <v-text-field
                v-model="color"
                label="Цвет животного"
                required
              ></v-text-field>
            </v-sheet>
  
            <v-sheet class="mx-auto" width="350">
              <v-select
                v-model="category"
                :items="categories"
                item-title="name_category"
                item-value="id"
                label="Категория"
                required
                return-object
              ></v-select>
            </v-sheet>
  
            <v-sheet class="mx-auto" width="350">
              <v-date-input
                v-model="date"
                :formatDate="formatDate"
                clearable
                placeholder="дд.мм.гг"
                label="Дата рождения"
                required
              ></v-date-input>
            </v-sheet>
            <v-sheet class="mx-auto" width="350">
              <v-file-upload
                accept="image/*"
                @change="onFileChange"
                clearable
                density="compact"
                variant="compact"
              ></v-file-upload>
            </v-sheet>
          </v-form>
          <v-card-actions>
          <v-spacer></v-spacer>

            <v-btn
            text="Подтвердить"
            @click.prevent="addPet"
            >Подтвердить</v-btn>

            <v-btn
            text="Закрыть"
            @click="dialog = false"
          ></v-btn>
        </v-card-actions>   
        </div>
      </v-card>
    </v-dialog>
  </template>
  
  <script setup>
  import axios from 'axios';
  import { ref, onMounted } from 'vue';
  import Cookies from 'js-cookie';
  import router from '../router/router';
  
  const dialog = ref(false);
  const name = ref('');
  const color = ref('');
  const date = ref('');
  const category = ref(null);
  const categories = ref([]);
  const imagePreview = ref(null);
  const imageFile = ref(null);
  const emit = defineEmits(['pet-created']);
  
  const onFileChange = (files) => {
    if (Array.isArray(files)) {
      imageFile.value = files[0] || null;
      imagePreview.value = URL.createObjectURL(files[0]);
    } else {
      imageFile.value = files || null;
      imagePreview.value = URL.createObjectURL(files);
    }
  };
  
  const addPet = () => {
    const formattedDate = date.value ? new Date(date.value).toISOString().split('T')[0] : null;
    const formData = new FormData();
    formData.append('name_pet', name.value);
    formData.append('color', color.value);
    formData.append('birth_date', formattedDate);
    formData.append('category_id', category.value.id);
    if (imageFile.value) {
      formData.append('image', imageFile.value);
    }
  
    axios.post('/api/pets', formData, {
      headers: { 'Content-Type': 'multipart/form-data' }
    }).then(response => {
      console.log('Питомец добавлен:', response.data);
      name.value = '';
      color.value = '';
      date.value = '';
      category.value = null;
      imageFile.value = null;
      imagePreview.value = null;
      dialog.value = false;
      emit('pet-created', response.data);
    }).catch(error => {
      console.error('Ошибка при добавлении питомца:', error);
    });
  };
  
  const formatDate = (value) => {
    if (!value) return '';
    const d = new Date(value);
    const day = String(d.getDate()).padStart(2, '0');
    const month = String(d.getMonth() + 1).padStart(2, '0');
    const year = String(d.getFullYear()).slice(-2);
    return `${day}/${month}/${year}`;
  };
  
  onMounted(() => {
    axios.get('/api/categories').then(response => {
      categories.value = response.data;
    }).catch(error => {
      console.error('Ошибка при загрузке категорий:', error);
    });
  });
  </script>
  
  <style>
  .button {
    background-color: #C7FFBA;
    color: #037247;
    margin-bottom: 15px;
  }
  .v-img {
    margin: 0 auto;
  }
  .v-sheet p {
    text-align: center;
  }
  .v-sheet {
    margin: 5px 0;
  }
  </style>
  