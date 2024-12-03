<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CustomerForm from '@/Components/Customer/Form.vue';

defineProps({
  customerStatuses: Array,
});
</script>

<template>
  <AuthenticatedLayout title="Create A New Customer">
    <template #heading>Create A New Customer</template>

    <template #default>
      <CustomerForm :customerStatuses="customerStatuses" />
    </template>
  </AuthenticatedLayout>
</template>
