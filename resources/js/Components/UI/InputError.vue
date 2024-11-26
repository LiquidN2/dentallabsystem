<script setup>
const { error = null } = defineProps({
  error: String,
});
</script>

<template>
  <p class="mt-2 text-sm text-red-600 dark:text-red-500" v-if="error">
    {{ error }}
  </p>
</template>
