<script setup>
import { onMounted, ref } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

const { url, label } = defineProps({
  url: String,
  label: String,
});

const page = usePage();

const active = ref(false);

onMounted(() => {
  active.value = url === '/' ? page.url === url : page.url.startsWith(url);
  console.log('Mounted');
});
</script>

<template>
  <Link
    class="rounded-md px-3 py-2 font-medium"
    :class="{
      'bg-gray-900 text-white': active,
      'text-gray-300 hover:bg-gray-700 hover:text-white': !active,
    }"
    :href="url"
  >
    {{ label }}
  </Link>
</template>

<style scoped></style>
