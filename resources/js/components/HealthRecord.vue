<template>
  <v-dialog max-width="400" v-model="dialog">
    <template v-slot:activator="{ props: activatorProps }">
      <v-btn
        v-bind="activatorProps"
        class="button"
        text="Запись о здоровье"
        variant="flat"
      ></v-btn>
    </template>

    <v-card title="Редактирование записи о здоровье">
      <div class="container">
        <v-form @submit.prevent="updateHealthRecord">
          <v-sheet class="mx-auto" width="350">
            <v-textarea
              v-model="description"
              label="Описание"
              required
            ></v-textarea>
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

const props = defineProps(['record']);
const emit = defineEmits(['record-updated']);

const dialog = ref(false);
const description = ref('');

// Предзаполнение значений
watch(() => props.record, (newVal) => {
  if (newVal) {
    description.value = newVal.description;
  }
}, { immediate: true });

const updateHealthRecord = () => {
  axios.put(`/api/health_records/${props.record.id}`, {
    description: description.value
  }).then(response => {
    console.log('Запись о здоровье обновлена:', response.data);
    emit('record-updated', response.data);
    dialog.value = false;
  }).catch(error => {
    console.error('Ошибка при обновлении записи о здоровье:', error);
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