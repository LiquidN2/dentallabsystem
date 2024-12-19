<script setup>
import { useForm } from '@inertiajs/vue3';
import Button from '@/Components/UI/Button.vue';

defineProps({
  customerId: Number,
});

const form = useForm({});
</script>

<template>
  <form @submit.prevent="form.delete(`/customers/${customerId}`)">
    <Button type="submit" theme="danger">Delete</Button>
  </form>
</template>
