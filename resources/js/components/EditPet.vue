<template>
    <v-dialog max-width="400" v-model="dialog">
      <template v-slot:activator="{ props: activatorProps }">
        <v-btn
          class="button"
          density="compact"
          icon="mdi-pencil"
          v-bind="activatorProps"
          text="Редактировать"
          variant="flat"
        ></v-btn>
      </template>
  
      <v-card title="Редактирование питомца">
        <div class="container">
          <v-form @submit.prevent="updatePet">
            <v-sheet class="mx-auto" width="350">
              <v-text-field
                v-model="namePet"
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
                v-model="birthDate"
                :formatDate="formatDate"
                clearable
                placeholder="дд.мм.гг"
                label="Дата рождения"
                required
              ></v-date-input>
            </v-sheet>
  
            <v-btn class="mt-2" type="submit" block>Сохранить</v-btn>
          </v-form>
        </div>
  
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn text="Закрыть" @click="dialog = false"></v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </template>
  
  <script setup>
  import axios from 'axios';
  import { ref, watch } from 'vue';
  
  const props = defineProps(['pet', 'categories']);
  const emit = defineEmits(['pet-updated']);
  
  const dialog = ref(false);
  const namePet = ref('');
  const color = ref('');
  const birthDate = ref('');
  const category = ref(null);
  
  // Предзаполнение значений
  watch(() => props.pet, (newVal) => {
    if (newVal) {
      namePet.value = newVal.name_pet;
      color.value = newVal.color;
      birthDate.value = newVal.birth_date;
      category.value = newVal.category_id;
    }
  }, { immediate: true });
  
  const updatePet = () => {
    axios.put(`/api/pets/${props.pet.id_pet}`, {
      name_pet: namePet.value,
      color: color.value,
      birth_date: birthDate.value,
      category_id: category.value
    }).then(response => {
      console.log('Питомец обновлен:', response.data);
      emit('pet-updated', response.data);
      dialog.value = false;
    }).catch(error => {
      console.error('Ошибка при обновлении питомца:', error);
    });
  };
  
  const formatDate = (value) => {
    if (!value) return '';
    const d = new Date(value);
    const day = String(d.getDate()).padStart(2, '0');
    const month = String(d.getMonth() + 1).padStart(2, '0');
    const year = String(d.getFullYear()).slice(-2); // последние 2 цифры года
    return `${day}/${month}/${year}`;
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