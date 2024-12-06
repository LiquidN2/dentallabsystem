<script setup>
import { computed } from 'vue';

const { theme = 'default', label = 'label' } = defineProps({
  theme: String,
  label: String,
});

const themeClass = computed(() => {
  switch (theme) {
    case 'green':
    case 'success':
      return 'bg-green-50 text-green-700 ring-green-600/20';

    case 'yellow':
    case 'warning':
      return 'bg-yellow-50 text-yellow-800 ring-yellow-600/20';

    case 'red':
    case 'danger':
      return 'bg-red-50 text-red-700 ring-red-600/10';

    case 'blue':
    case 'info':
      return 'bg-blue-50 text-blue-700 ring-blue-700/10';

    case 'indigo':
      return 'bg-indigo-50 text-indigo-700 ring-indigo-700/10';

    case 'purple':
      return 'bg-purple-50 text-purple-700 ring-purple-700/10';

    case 'pink':
      return 'bg-pink-50 text-pink-700 ring-pink-700/10';

    case 'gray':
    case 'default':
    default:
      return 'bg-gray-50 text-gray-600 ring-gray-500/10';
  }
});
</script>

<template>
  <span
    class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset"
    :class="themeClass"
    v-html="label.charAt(0).toUpperCase() + label.slice(1)"
  />
</template>
