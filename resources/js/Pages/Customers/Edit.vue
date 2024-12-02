<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CustomerForm from '@/Components/Customer/Form.vue';

const { customer } = defineProps({
  customer: Object,
});
</script>

<template>
  <AuthenticatedLayout title="Edit Customer Information">
    <template #heading>Edit Customer Information</template>

    <template #default>
      <CustomerForm :customer="customer" />
    </template>
  </AuthenticatedLayout>
</template>
