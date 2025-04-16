<template>
  <v-dialog max-width="400">
    <template v-slot:activator="{ props: activatorProps }">
      <v-btn class="button"
        v-bind="activatorProps"
        text="Регистрация"
        variant="flat"
      ></v-btn>
    </template>
    
    <template v-slot:default="{ isActive }">
      <v-card title="Регистрация">
        <div class="container">
          <v-form @submit.prevent>
            <v-sheet class="mx-auto" width="350">
                <v-text-field
                    v-model="name"
                    label="Имя"
                ></v-text-field>
            </v-sheet>
            <v-sheet class="mx-auto" width="350">
              <v-text-field
                  v-model="email"
                  label="E-mail"
              ></v-text-field>
            </v-sheet>
            <v-sheet class="mx-auto" width="350">
              <v-text-field
                  v-model="password"
                  label="Пароль"
                  type="password"
              ></v-text-field>
            </v-sheet>
            <v-sheet class="mx-auto" width="350">
              <v-text-field
                  v-model="password_confirmation"
                  label="Подтверждение пароля"
                  type="password"
              ></v-text-field>
            </v-sheet>
          </v-form>
          <div class="politics_privacy">
            <v-switch label="Согласие с политикой конфидециальности"></v-switch>
            <v-switch label="Согласие с политикой персональных данных"></v-switch>
          </div>
        </div>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            text="Подтвердить"
            @click.prevent="register"
            @click="isActive.value = true"
          ></v-btn>
          <v-btn
            text="Закрыть"
            @click="isActive.value = false"
          ></v-btn>
        </v-card-actions>
      </v-card>
    </template>
  </v-dialog>

</template>

<style>
.v-card {
  padding: 10px;
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
.v-switch {
  width: 350px;
  margin-left: 20px;
}
.v-switch label{
  font-size: 12px;
}
.v-switch .v-switch__track {
  background-color: #C7FFBA;
}
.v-btn {
  background-color: #C7FFBA;
}
</style>

<script setup>
  import axios from 'axios'
  import Cookies from 'js-cookie'
  import { ref } from 'vue'
  import router from '../router/router'
  const dialog = ref(false)
  const name = ref(null)
  const email = ref(null)
  const password = ref(null)
  const password_confirmation = ref(null)
  
  const register = () => {
    axios.get('/sanctum/csrf-cookie').then(response => {
      const xsrfToken = Cookies.get('XSRF-TOKEN')
      localStorage.setItem('x_xsrf_token', xsrfToken)

      axios.post('/register', {
        name: name.value,
        email: email.value,
        password: password.value,
        password_confirmation: password_confirmation.value
      }).then(res => {
        router.push('/profile')
        console.log('Registration succesful')
      }).catch(err => {
        console.log('Ошибка при регистрации:', err.response)
      })
    })
    
  }
</script>
