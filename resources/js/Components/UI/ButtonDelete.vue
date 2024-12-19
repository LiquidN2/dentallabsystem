<script setup>
import { useForm } from '@inertiajs/vue3';
import Button from '@/Components/UI/Button.vue';

defineProps({
  id: {
    type: String,
    required: true,
  },
  handlerEndpoint: {
    type: String,
    required: true,
  },
});

const form = useForm({});
</script>

<template>
  <form :id="id" @submit.prevent="form.delete(handlerEndpoint)">
    <Button type="submit" :form="id" theme="danger">
      <slot />
    </Button>
  </form>
</template>
