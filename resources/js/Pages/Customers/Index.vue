<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
</script>

<template>
  <AuthenticatedLayout title="Dashboard">
    <template #heading>Customers</template>

    <template #default>Customers page content</template>
  </AuthenticatedLayout>
</template>

<style scoped></style>
