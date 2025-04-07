<template>
    <v-container>
      <v-row justify="center" align="center">
        <v-col cols="12" md="6">
          <v-card class="pa-4" elevation="4">
            <v-card-title class="headline">
              Vuetify Select and Buttons Example
            </v-card-title>
            <v-card-text>
              <v-select
                :items="items"
                label="Select an option"
                v-model="selectedItem"
                outlined
              ></v-select>
            </v-card-text>
            <v-card-actions>
              <v-btn color="primary" @click="showAlert">
                Show Alert
              </v-btn>
              <v-btn color="secondary" @click="resetSelection">
                Reset
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </template>
  
  <script>
  export default {
    name: "ExampleComponent",
    data() {
      return {
        items: ["Option 1", "Option 2", "Option 3"],
        selectedItem: null,
      };
    },
    methods: {
      showAlert() {
        if (this.selectedItem) {
          alert(`You selected: ${this.selectedItem}`);
        } else {
          alert("Please select an option first.");
        }
      },
      resetSelection() {
        this.selectedItem = null;
      },
    },
  };
  </script>
  
  <style scoped>
  .v-card {
    border-radius: 12px;
  }
  .headline {
    font-size: 1.5rem;
    font-weight: 500;
    letter-spacing: 0.0125em;
  }
  </style>
  