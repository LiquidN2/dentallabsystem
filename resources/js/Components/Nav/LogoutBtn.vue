<script setup>
import { router } from '@inertiajs/vue3';

const handleLogout = () => {
  router.post('/logout');
};
</script>

<template>
  <form @submit.prevent="handleLogout">
    <button
      type="submit"
      class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
      role="menuitem"
      tabindex="-1"
      id="user-menu-item-2"
    >
      Logout
    </button>
  </form>
</template>

<style scoped></style>
