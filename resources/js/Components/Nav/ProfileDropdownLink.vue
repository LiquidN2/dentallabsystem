<script setup>
import { onMounted, ref } from 'vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const active = ref(false);

const { url, label } = defineProps({
  url: String,
  label: String,
});

onMounted(() => {
  active.value = url === '/' ? page.url === url : page.url.startsWith(url);
});
</script>

<template>
  <a
    :href="url"
    class="block px-4 py-2 text-sm text-gray-700"
    :class="{ 'bg-gray-100': active, 'hover:bg-gray-100': !active }"
    role="menuitem"
    tabindex="-1"
    id="user-menu-item-0"
  >
    {{ label }}
  </a>
</template>

<style scoped></style>
