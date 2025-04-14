<script setup>
    const items_clinics = ['ул. Пушкинская, д.72', '1-ая Барикадная, д.29', 'пер. Соборный, 94б', 'ул.Казахская, д.49']
    const items_pets = ['Коты, до 5 лет', 'Котята, до 2 лет']
</script>

<template>
    <header class="header">
        <ul class="no-markers">
            <li class="li"><img src="/assets/logos/LOGO_short.svg" class="logo"></li>
            <li class="li"><router-link to="/profile"> Профиль</router-link></li>
            <li class="li"> Категории здоровья </li>
            <li class="li"><router-link to="/reports"> Отчеты</router-link></li>
            <li class="li"><router-link to="/settings"> Настройки</router-link></li>
        </ul>
    </header>
    
    <div class="body_categories">
        <h1 class="h1">Категории здоровья</h1>
        <p><v-btn class="button"
            v-bind="activatorProps"
            text="Создать"
            variant="flat"
            ></v-btn></p>
    </div>

    <v-form v-model="valid" class="textField">
    <v-container>
      <v-row>
        <v-col
          cols="12"
          md="4"
        >
          <v-text-field
            v-model="firstname"
            :counter="10"
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
            :counter="10"
            :rules="nameRules"
            label="Описание (от/до возраста)"
            required
            ></v-text-field>
        </v-col>

        <v-col
          cols="12"
          md="4"
        >
          <v-btn class="button"
            v-bind="activatorProps"
            text="Создать"
            variant="flat"
            ></v-btn>
        </v-col>
      </v-row>
    </v-container>
  </v-form>
</template>

<style>
.h1{
    color:#037247;
    margin-bottom: 25px;
    font-size: 28px;
}
.button{
    background-color: #C7FFBA;
    color: #037247;
    width: 200px;
    height: 50px;
    border-radius: 20px;
    font-size: 14px;
    margin-bottom: 15px;
}
.body_categories{
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    margin-top: 25px;
}
.textField{
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>

<script>
  export default {
    data: () => ({
      valid: false,
      firstname: '',
      lastname: '',
      nameRules: [
        value => {
          if (value) return true

          return 'Поле обязательно.'
        },
        value => {
          if (value?.length <= 10) return true

          return 'Текст должен быть менее 10 символов'
        },
      ],
      
    }),
  }
</script>