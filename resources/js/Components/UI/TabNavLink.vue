<script setup>
import { onMounted, ref } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

const { url } = defineProps({
  url: String,
});

const page = usePage();
const active = ref(false);

onMounted(() => {
  active.value = url === '/' ? page.url === url : page.url.startsWith(url);
});
</script>

<template>
  <Link
    :href="url"
    class="inline-block p-4 border-b-2 rounded-t-lg"
    :class="{
      'text-indigo-600 border-indigo-600 active': active,
      'border-transparent hover:text-gray-600 hover:border-gray-300': !active,
    }"
  >
    <slot />
  </Link>
</template>
