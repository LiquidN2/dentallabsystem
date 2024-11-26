<script setup>
import { Link } from '@inertiajs/vue3';

const { url = '#', isButton = false } = defineProps({
  url: String,
  isButton: Boolean,
});
</script>

<template>
  <Link
    :href="url"
    :class="{
      'font-semibold text-indigo-600 hover:text-indigo-500': !isButton,
      'flex justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600':
        isButton,
    }"
  >
    <slot />
  </Link>
</template>
