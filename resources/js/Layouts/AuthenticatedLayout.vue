<script setup>
import { Head } from '@inertiajs/vue3';
import NavBar from '@/Components/Nav/NavBar.vue';
import FlashMessage from '@/Components/UI/FlashMessage.vue';

const { title = '' } = defineProps({
  title: String,
});
</script>

<template>
  <Head>
    <title>{{ title }}</title>
  </Head>

  <NavBar />

  <header class="bg-white shadow">
    <div
      class="flex justify-between items-center mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8"
    >
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">
        <slot name="heading" />
      </h1>

      <div class="flex items-center">
        <slot name="links"></slot>
      </div>
    </div>
  </header>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <FlashMessage />

      <!-- Your content -->
      <slot />
    </div>
  </main>
</template>

<style scoped></style>
