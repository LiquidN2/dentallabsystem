<script setup>
import TabNavLink from '@/Components/UI/TabNavLink.vue';

defineProps({
  links: Array,
});
</script>

<template>
  <div
    class="mb-6 text-sm font-medium text-center text-gray-500 border-b border-gray-100"
  >
    <ul class="flex flex-wrap -mb-px">
      <template v-for="({ url, label }, index) in links" :key="index">
        <li class="me-2">
          <TabNavLink :url="url">{{ label }}</TabNavLink>
        </li>
      </template>
    </ul>
  </div>
</template>
