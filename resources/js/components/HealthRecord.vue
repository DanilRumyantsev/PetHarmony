<template>
<v-dialog>
    <template v-slot:activator="{ props: activatorProps }">
    <v-btn class="button_mini"
      v-bind="activatorProps"
      text="Запись о здоровье"
      variant="flat"
    ></v-btn>
  </template>

  <template v-slot:default="{ isActive }">
    <v-card 
    class="mx-auto"
    style="width: 500px;"
  >
    <v-toolbar
      color="green"
      cards
      dark
      flat>
    <v-spacer></v-spacer>
      <v-card-title class="text-h6 font-weight-regular">
        Запись о здоровье
      </v-card-title>
    <v-spacer></v-spacer>

    </v-toolbar>
    <v-form
      ref="form"
      v-model="isValid"
      class="pa-4 pt-6">
      <v-text-field
        v-model="date_1"
        color="green"
        label="Дата записи"
        style="min-height: 96px"
        type="text"
        variant="filled"
      ></v-text-field>
      <v-text-field
        v-model="date_2"
        color="green"
        label="Дата последней прививки"
        variant="filled"
      ></v-text-field>
      <v-textarea
        v-model="bio"
        color="green"
        label="Описание"
        rows="1"
        variant="filled"
        auto-grow
      ></v-textarea>
    </v-form>
    <v-divider></v-divider>
    <v-card-actions>
      <v-btn
        variant="text"
        @click="form.reset()">
        Очистить
      </v-btn>
      <v-btn
        text="Закрыть"
        @click="isActive.value = false"
      ></v-btn>
      <v-spacer></v-spacer>
      <v-btn
        :disabled="!isValid"
        :loading="isLoading"
        color="green">
        Сохранить
      </v-btn>
    </v-card-actions>
    </v-card>
  </template>
  
</v-dialog>
  
</template>

<script setup>
  import { ref } from 'vue'

  const form = ref()

  const agreement = ref(false)
  const bio = ref('Добавьте сюда информацию о состоянии здоровья вашего питомца')
  const dialog = ref(false)
  const isValid = ref(false)
  const isLoading = ref(false)
  const date_1 = ref()
  const date_2 = ref()

</script>