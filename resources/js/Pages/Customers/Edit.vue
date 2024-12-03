<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CustomerForm from '@/Components/Customer/Form.vue';

defineProps({
  customer: Object,
  customerStatuses: Array,
});
</script>

<template>
  <AuthenticatedLayout title="Edit Customer Information">
    <template #heading>Edit Customer Information</template>

    <template #default>
      <CustomerForm :customer="customer" :customerStatuses="customerStatuses" />
    </template>
  </AuthenticatedLayout>
</template>
