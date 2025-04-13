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
            <v-sheet class="mx-auto" width="350">
                <v-form @submit.prevent>
                <v-text-field
                    v-model="login"
                    label="Login"
                ></v-text-field>
                </v-form>
            </v-sheet>
            <v-sheet class="mx-auto" width="350">
                <v-form @submit.prevent>
                <v-text-field
                    v-model="email"
                    label="Email"
                ></v-text-field>
                </v-form>
            </v-sheet>
            <v-sheet class="mx-auto" width="350">
                <v-form @submit.prevent>
                <v-text-field
                    v-model="password"
                    label="Password"
                ></v-text-field>
                </v-form>
            </v-sheet>

            <div>
            <!-- <v-checkbox label="Checkbox"></v-checkbox> -->
            <v-checkbox
                v-model="checkbox"
                label="Согласие с политикой конфидециальности"
                required
            ></v-checkbox>
            <v-checkbox
                v-model="checkbox"
                label="Согласие с политикой персональных данных"
                required
            ></v-checkbox>
            </div>
        </div>
        
            
      <v-card-actions>
        <v-spacer>
        </v-spacer>

        <v-btn
          text="Подтвердить"
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
.button{
    background-color: #C7FFBA;
    color: #037247;
    width: 200px;
    height: 50px;
    border-radius: 20px;
    font-size: 14px;
    margin-bottom: 15px;
}
.checkbox{
    margin-left: 50px;
}
</style>

<script setup>
// dialog window
    import { ref, vModelCheckbox } from 'vue'
    const dialog = ref(false)
// form

</script>
