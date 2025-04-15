<template>
<v-dialog max-width="400">
  <template v-slot:activator="{ props: activatorProps }">
    <v-btn class="button"
      v-bind="activatorProps"
      text="Вход"
      variant="flat"
    ></v-btn>
  </template>

  <template v-slot:default="{ isActive }">
    <v-card title="Вход">
        <div class="container">
            <v-sheet class="mx-auto" width="350">
                <v-form @submit.prevent>
                <v-text-field
                    v-model="login"
                    label="Login"
                ></v-text-field>
                <!-- <v-btn class="mt-2" type="submit" block>Submit</v-btn> -->
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