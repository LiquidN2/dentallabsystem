<script setup>
const { error = null } = defineProps({
  error: String,
});
</script>

<template>
  <p class="text-sm text-red-600 dark:text-red-500" v-if="error">
    {{ error }}
  </p>
</template>
