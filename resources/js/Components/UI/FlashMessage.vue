<script setup>
import { onMounted, reactive, watch } from 'vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();

const state = reactive({
  hidden: true,
  type: 'default',
  content: '',
});

// Display message when navigated to a new page
onMounted(() => {
  if (!page.props.flash.message) return;
  state.hidden = false;
  state.type = page.props.flash.message.type;
  state.content = page.props.flash.message.content;
  setTimeout(() => {
    state.hidden = true;
  }, 3000);
});

// Watcher to display message on current page
watch(
  () => page.props.flash.message,
  async (newValue, _oldValue) => {
    if (!newValue) return;
    state.hidden = false;
    state.type = newValue.type;
    state.content = newValue.content;
    setTimeout(() => {
      state.hidden = true;
    }, 3000);
  },
);
</script>

<template>
  <div
    class="flex items-center p-4 mb-4 text-sm rounded-lg"
    :class="{
      'text-gray-800 bg-gray-50': state.type === 'default',
      'text-green-800 bg-green-50': state.type === 'success',
      'text-red-800 bg-red-50':
        state.type === 'danger' || state.type === 'error',
      'text-yellow-800 bg-yellow-50': state.type === 'warning',
      'text-blue-800 bg-blue-50': state.type === 'info',
    }"
    role="alert"
    v-if="!state.hidden"
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
      {{ state.content }}
    </div>
  </div>
</template>
