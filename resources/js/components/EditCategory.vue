<template>
    <v-dialog max-width="400" v-model="dialog">
      <template v-slot:activator="{ props: activatorProps }">
        <v-btn
          v-bind="activatorProps"
          text="Редактировать"
          variant="flat"
        ></v-btn>
      </template>
  
      <v-card title="Редактирование категории">
        <div class="container">
          <v-form @submit.prevent="updateCategory">
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
          <v-btn text="Сохранить" @click.prevent="updateCategory"></v-btn>
          <v-btn text="Закрыть" @click="dialog = false"></v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </template>
  
  <script setup>
  import axios from 'axios';
  import { ref, watch } from 'vue';
  
  const props = defineProps(['category']);
  const emit = defineEmits(['category-updated']);
  
  const dialog = ref(false);
  const nameCategory = ref('');
  const description = ref('');
  
  // Предзаполнение значений
  watch(() => props.category, (newVal) => {
    if (newVal) {
      nameCategory.value = newVal.name_category;
      description.value = newVal.description;
    }
  }, { immediate: true });
  
  const updateCategory = () => {
    axios.put(`/api/categories/${props.category.id}`, {
      name_category: nameCategory.value,
      description: description.value
    }).then(response => {
      console.log('Категория обновлена:', response.data);
      emit('category-updated', response.data);
      dialog.value = false;
    }).catch(error => {
      console.error('Ошибка при обновлении категории:', error);
    });
  };
  </script>
  
<style scoped>
.v-btn {
    background-color: #E8E8E8;
}
</style>