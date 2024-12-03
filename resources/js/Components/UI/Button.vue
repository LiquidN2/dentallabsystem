<script setup>
const { theme = 'default' } = defineProps({
  theme: String,
});
</script>

<template>
  <button
    class="flex justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
    :class="{
      'bg-gray-50 text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline-gray-100':
        theme === 'default',
      'bg-indigo-600 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline-indigo-600':
        theme === 'primary',
      'bg-red-600 text-white shadow-sm hover:bg-red-500 focus-visible:outline-red-600':
        theme === 'danger',
    }"
  >
    <slot />
  </button>
</template>
