<script setup>
import Logo from '@/Components/Nav/Logo.vue';
import MobileNav from '@/Components/Nav/MobileNav.vue';
import NavLink from '@/Components/Nav/NavLink.vue';
import ProfileDropdown from '@/Components/Nav/ProfileDropdown.vue';

const navLinks = [
  { url: '/', label: 'Dashboard' },
  { url: '/customers', label: 'Customers' },
  { url: '/orders', label: 'Orders' },
];
</script>

<template>
  <nav class="bg-gray-800">
    <!-- Desktop Nav Bar -->
    <div class="hidden md:block mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <Logo />

          <div class="ml-10 flex items-baseline space-x-4">
            <NavLink
              v-for="({ url, label }, index) in navLinks"
              :key="index"
              :url="url"
            >
              {{ label }}
            </NavLink>
          </div>
        </div>

        <div class="ml-4 flex items-center md:ml-6">
          <button
            type="button"
            class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
          >
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">View notifications</span>
            <svg
              class="size-6"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              aria-hidden="true"
              data-slot="icon"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
              />
            </svg>
          </button>

          <!-- Profile dropdown -->
          <ProfileDropdown />
        </div>
      </div>
    </div>

    <!-- Mobile Nav Bar -->
    <MobileNav />
  </nav>
</template>

<style scoped></style>
