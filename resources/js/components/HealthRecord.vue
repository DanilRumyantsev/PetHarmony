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

    <v-card :title="record ? 'Редактирование записи о здоровье' : 'Создание записи о здоровье'">
      <div class="container">
        <v-form @submit.prevent="saveHealthRecord">
          <v-sheet class="mx-auto" width="350">
            <v-textarea
              v-model="description"
              label="Описание"
              required
            ></v-textarea>
          </v-sheet>

          <v-sheet class="mx-auto" width="350">
            <v-date-input
              v-model="recordDate"
              :formatDate="formatDate"
              clearable
              placeholder="дд.мм.гг"
              label="Дата записи"
              required
            ></v-date-input>
          </v-sheet>

          <v-sheet class="mx-auto" width="350">
            <v-date-input
              v-model="vaccinationDate"
              :formatDate="formatDate"
              clearable
              placeholder="дд.мм.гг"
              label="Дата прививки"
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

const props = defineProps(['record', 'petId']); // Убедитесь, что petId передается
const emit = defineEmits(['record-updated', 'record-created']);

const dialog = ref(false);
const description = ref('');
const recordDate = ref('');
const vaccinationDate = ref('');

// Предзаполнение значений
watch(() => props.record, (newVal) => {
  if (newVal) {
    description.value = newVal.description;
    recordDate.value = newVal.record_date;
    vaccinationDate.value = newVal.vaccination_date;
  }
}, { immediate: true });

const saveHealthRecord = () => {
  const data = {
    description: description.value,
    record_date: recordDate.value,
    vaccination_date: vaccinationDate.value,
    id_pet: props.petId // Убедитесь, что petId передается
  };

  console.log('Sending data:', data); // Логирование данных перед отправкой

  if (props.record && props.record.id) {
    axios.put(`/api/health_records/${props.record.id}`, data).then(response => {
      console.log('Запись о здоровье обновлена:', response.data);
      emit('record-updated', response.data);
      dialog.value = false;
    }).catch(error => {
      console.error('Ошибка при обновлении записи о здоровье:', error);
    });
  } else {
    axios.post('/api/health_records', data).then(response => {
      console.log('Запись о здоровье создана:', response.data);
      emit('record-created', response.data);
      dialog.value = false;
    }).catch(error => {
      console.error('Ошибка при создании записи о здоровье:', error);
    });
  }
};
</script>

<style scoped>
.button {
  background-color: #EAFFEA;
  color: #037247;
  width: fit;
  height: 35px;
  border-radius: 20px;
  font-size: 10px;
  margin-right: 5px;
}
</style>