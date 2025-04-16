<template>
  <v-dialog max-width="400">
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

    <template v-slot:default="{ isActive }">
      <v-card title="Создание питомца">
        <div class="container">
          <v-form @submit.prevent="addPet">
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
          </v-form>
        </div>

        <v-card-actions>
          <v-spacer></v-spacer>

            <v-btn
            text="Подтвердить"
            @click.prevent="addPet"
            >Подтвердить</v-btn>

            <v-btn
            text="Закрыть"
            @click="isActive.value = false"
          ></v-btn>
        </v-card-actions>
      </v-card>
    </template>
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

const addPet = () => {
    const formattedDate = date.value ? new Date(date.value).toISOString().split('T')[0] : null;
    axios.post('/api/pets', {
    name_pet: name.value,
    color: color.value,
    birth_date: formattedDate,
    category_id: category.value.id
  }).then(response => {
    console.log('Питомец добавлен:', response.data)
  }).catch(error => {
    console.error('Ошибка при добавлении питомца:', error)
  })
};
const formatDate = (value) => {
  if (!value) return ''
  const d = new Date(value)
  const day = String(d.getDate()).padStart(2, '0')
  const month = String(d.getMonth() + 1).padStart(2, '0')
  const year = String(d.getFullYear()).slice(-2) // последние 2 цифры года
  return `${day}/${month}/${year}`
}

onMounted(() => {
  axios.get('/api/categories').then(response => {
    categories.value = response.data;
  }).catch(error => {
    console.error('Ошибка при загрузке категорий:', error);
  });
});
</script>

<style scoped>
.button {
  background-color: #C7FFBA;
  color: #037247;
  margin-bottom: 15px;
}
</style>