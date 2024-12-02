<script setup>
import { onMounted, reactive } from 'vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();

const message = reactive({
  hidden: true,
  type: 'default',
  content: 'Flash message content',
});

onMounted(() => {
  if (!page.props.flash.message) return;

  message.hidden = false;
  message.type = page.props.flash.message?.type;
  message.content = page.props.flash.message?.content;

  setTimeout(() => {
    message.hidden = true;
  }, 3000);
});
</script>

<template>
  <div
    class="flex items-center p-4 mb-4 text-sm rounded-lg"
    :class="{
      'text-gray-800 bg-gray-50': message.type === 'default',
      'text-green-800 bg-green-50': message.type === 'success',
      'text-red-800 bg-red-50': message.type === 'danger',
      'text-yellow-800 bg-yellow-50': message.type === 'warning',
      'text-blue-800 bg-blue-50': message.type === 'info',
    }"
    role="alert"
    v-if="!message.hidden"
  >
    <svg
      class="flex-shrink-0 inline w-4 h-4 me-3"
      aria-hidden="true"
      xmlns="http://www.w3.org/2000/svg"
      fill="currentColor"
      viewBox="0 0 20 20"
    >
      <path
        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"
      />
    </svg>
    <span class="sr-only">Info</span>
    <div>
      {{ message.content }}
    </div>
  </div>
</template>
