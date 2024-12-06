<script setup>
import { computed } from 'vue';

const { status = 'default' } = defineProps({ status: String });

const className = computed(() => {
  const defaultClass =
    'inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset';

  let statusClass = '';

  switch (status) {
    case 'active':
    case 'success':
    case 'complete':
    case 'dispatched':
      statusClass = 'bg-green-50 text-green-700 ring-green-600/20';
      break;

    case 'suspended':
    case 'warning':
    case 'onhold':
      statusClass = 'bg-yellow-50 text-yellow-800 ring-yellow-600/20';
      break;

    case 'banned':
    case 'danger':
      statusClass = 'bg-red-50 text-red-700 ring-red-600/10';
      break;

    case 'info':
    case 'processing':
      statusClass = 'bg-blue-50 text-blue-700 ring-blue-700/10';
      break;

    case 'incomplete':
    case 'inactive':
    case 'cancelled':
    case 'default':
    default:
      statusClass = 'bg-gray-50 text-gray-600 ring-gray-500/10';
      break;
  }

  return `${defaultClass} ${statusClass}`;
});
</script>

<template>
  <span
    :class="className"
    v-html="status.charAt(0).toUpperCase() + status.slice(1)"
  />
</template>
