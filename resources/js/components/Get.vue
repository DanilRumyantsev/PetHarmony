<template>
    Get
</template>

<script setup>
import axios from 'axios';
import { onMounted } from 'vue';

const getData = () => {
  axios.get('/api/get')
    .then(response => {
      console.log(response.data);
    })
    .catch(error => {
      console.error('Ошибка:', error.response?.data || error.message);
    });
};

onMounted(() => {
  getData();
});
</script>

<style scoped>
  
</style>