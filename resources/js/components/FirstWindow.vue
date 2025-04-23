<script>
import { mapGetters } from 'vuex';

export default {
  computed: {
    ...mapGetters(['currentFont'])
  },
  watch: {
    currentFont(newFont) {
      document.documentElement.style.setProperty('--app-font', newFont);
    }
  },
  mounted() {
    document.documentElement.style.setProperty('--app-font', this.currentFont);
  }
};
</script>


<template>
    <div class="app">
        <router-view></router-view>
    </div>
</template>

<style>
:root {
  --app-font: Arial, sans-serif;
}
* {
    margin: 0;
    padding: 0;
}
.app{
    margin: 0;
    padding: 0;
}
body{
    display: flex;
    justify-content: center;
    font-family: var(--app-font);
}
</style>
