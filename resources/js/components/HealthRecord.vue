<template>
<v-dialog>
    <template v-slot:activator="{ props: activatorProps }">
    <v-btn class="button_mini"
      v-bind="activatorProps"
      text="Запись о здоровье"
      variant="flat"
    ></v-btn>
  </template>
  <v-card
    class="mx-auto"
    style="width: 500px;"
  >
    <v-toolbar
      color="green"
      cards
      dark
      flat
    >
    <v-spacer></v-spacer>
      <v-card-title class="text-h6 font-weight-regular">
        Запись о здоровье
      </v-card-title>
    <v-spacer></v-spacer>

    </v-toolbar>
    <v-form
      ref="form"
      v-model="isValid"
      class="pa-4 pt-6"
    >
      <v-text-field
        v-model="password"
        :rules="[rules.password, rules.length(6)]"
        color="deep-purple"
        counter="6"
        label="Password"
        style="min-height: 96px"
        type="password"
        variant="filled"
      ></v-text-field>
      <v-text-field
        v-model="phone"
        color="deep-purple"
        label="Phone number"
        variant="filled"
      ></v-text-field>
      <v-text-field
        v-model="email"
        :rules="[rules.email]"
        color="deep-purple"
        label="Email address"
        type="email"
        variant="filled"
      ></v-text-field>
      <v-textarea
        v-model="bio"
        color="deep-purple"
        label="Bio"
        rows="1"
        variant="filled"
        auto-grow
      ></v-textarea>
    </v-form>
    <v-divider></v-divider>
    <v-card-actions>
      <v-btn
        variant="text"
        @click="form.reset()"
      >
        Clear
      </v-btn>
      <v-btn
          text="Закрыть"
          @click="isActive.value = false"
        ></v-btn>
      <v-spacer></v-spacer>
      <v-btn
        :disabled="!isValid"
        :loading="isLoading"
        color="green"
      >
        Submit
      </v-btn>
    </v-card-actions>
    </v-card>
</v-dialog>
  
</template>

<script setup>
  import { ref } from 'vue'

  const rules = {
    email: v => !!(v || '').match(/@/) || 'Please enter a valid email',
    length: len => v => (v || '').length >= len || `Invalid character length, required ${len}`,
    password: v => !!(v || '').match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/) || 'Password must contain an upper case letter, a numeric character, and a special character',
    required: v => !!v || 'This field is required',
  }

  const form = ref()

  const agreement = ref(false)
  const bio = ref('Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts')
  const dialog = ref(false)
  const email = ref()
  const isValid = ref(false)
  const isLoading = ref(false)
  const password = ref()
  const phone = ref()
</script>