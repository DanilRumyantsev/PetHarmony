<script setup>
    const items_clinics = ['ул. Пушкинская, д.72', '1-ая Барикадная, д.29', 'пер. Соборный, 94б', 'ул.Казахская, д.49']
    const items_pets = ['Коты, до 5 лет', 'Котята, до 2 лет']
// const variants = ['elevated', 'flat', 'tonal', 'outlined', 'text', 'plain']
    const variants = ['tonal']
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

    <div class="form">
        <v-form v-model="valid">
          <v-container>
            <v-row>
              <v-col
                cols="12"
                md="4"
              >
                <v-text-field
                  v-model="firstname"
                  rounded="xl"
                  :counter="15"
                  :rules="nameRules"
                  label="Вид животного"
                  required
                ></v-text-field>
              </v-col>

              <v-col
                cols="12"
                md="4"
              >
                <v-text-field
                  v-model="lastname"
                  rounded="xl"
                  :counter="15"
                  :rules="nameRules"
                  label="Описание (от/до возраста)"
                  required
                  ></v-text-field>
              </v-col>
              <v-btn class="button_create"
              v-bind="activatorProps"
              text="Создать"
              variant="flat"
              ></v-btn>
          </v-row>
        </v-container>
      </v-form>
  </div>
  
  <div class="categories">
    <v-row dense>
    <v-col
      v-for="(variant, i) in variants"
      :key="i"
      cols="12"
      md="4"
    >
      <v-card
        :variant="variant"
        class="mx-auto"
        color="surface-variant"
        max-width="300"
        subtitle="Возраст: до 5 лет"
        title="Коты"
        rounded="xl"
      >
        <template v-slot:actions>
          <v-btn text="Редактировать"></v-btn>
          <v-btn text="Удалить"></v-btn>
        </template>
      </v-card>
    </v-col>
    <v-col
      v-for="(variant, i) in variants"
      :key="i"
      cols="12"
      md="4"
    >
      <v-card
        :variant="variant"
        class="mx-auto"
        color="surface-variant"
        max-width="300"
        subtitle="Возраст: до 2 лет"
        title="Котята"
        rounded="xl"
      >
        <template v-slot:actions>
          <v-btn text="Редактировать"></v-btn>
          <v-btn text="Удалить"></v-btn>
        </template>
      </v-card>
    </v-col>
    <v-col
      v-for="(variant, i) in variants"
      :key="i"
      cols="12"
      md="4"
    >
      <v-card
        :variant="variant"
        class="mx-auto"
        color="surface-variant"
        max-width="300"
        subtitle="Возраст: до 2 лет"
        title="Щенки"
        rounded="xl"
      >
        <template v-slot:actions>
          <v-btn text="Редактировать"></v-btn>
          <v-btn text="Удалить"></v-btn>
        </template>
      </v-card>
    </v-col>
    <v-col
      v-for="(variant, i) in variants"
      :key="i"
      cols="12"
      md="4"
    >
      <v-card
        :variant="variant"
        class="mx-auto"
        color="surface-variant"
        max-width="300"
        subtitle="Возраст: до 7 лет"
        title="Собаки"
        rounded="xl"
      >
        <template v-slot:actions>
          <v-btn text="Редактировать"></v-btn>
          <v-btn text="Удалить"></v-btn>
        </template>
      </v-card>
    </v-col>
    </v-row>
  </div>
  
</template>

<style scoped>
.button_create{
    background-color: #C7FFBA;
    color: #037247;
    width: 200px;
    height: 40px;
    border-radius: 20px;
    font-size: 14px;
    margin: 25px 65px;
}
.form{
  width: 1000px; 
}
.categories{
  width: 1000px;
}
</style>

<script>
// export default {
//     data: () => ({
//       valid: false,
//       firstname: '',
//       lastname: '',
//       nameRules: [
//         value => {
//           if (value) return true

//           return 'Поле обязательно.'
//         },
//         value => {
//           if (value?.length <= 15) return true

//           return 'Текст должен быть менее 15 символов'
//         },
//       ],
      
//     }),
//   }
</script>