<script setup>
import { Link } from '@inertiajs/vue3';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TabNav from '@/Components/UI/TabNav.vue';

defineProps({
  title: String,
});

const links = [
  {
    url: '/products/items',
    label: 'Items',
  },
  {
    url: '/products/categories',
    label: 'Categories',
  },
];
</script>

<template>
  <AuthenticatedLayout :title="title">
    <template #heading>
      <slot name="heading" />
    </template>

    <template #links>
      <slot name="links" />
    </template>

    <template #default>
      <!-- Product Page NAV -->
      <TabNav :links="links" />

      <slot />
    </template>
  </AuthenticatedLayout>
</template>
