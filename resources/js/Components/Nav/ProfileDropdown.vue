<script setup>
import { ref, Transition } from 'vue';
import LogoutBtn from '@/Components/Nav/LogoutBtn.vue';
import ProfileDropdownLink from '@/Components/Nav/ProfileDropdownLink.vue';

const open = ref(false);

const profileLinks = [
  {
    url: '/profile',
    label: 'Profile',
  },
  {
    url: '/settings',
    label: 'Settings',
  },
];
</script>

<template>
  <div class="relative ml-3">
    <div>
      <button
        type="button"
        class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
        id="user-menu-button"
        aria-expanded="false"
        aria-haspopup="true"
        @click="open = !open"
      >
        <span class="absolute -inset-1.5"></span>
        <span class="sr-only">Open user menu</span>
        <img
          class="size-8 rounded-full"
          src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
          alt=""
        />
      </button>
    </div>

    <!--
        Dropdown menu, show/hide based on menu state.

        Entering: "transition ease-out duration-100"
          From: "transform opacity-0 scale-95"
          To: "transform opacity-100 scale-100"
        Leaving: "transition ease-in duration-75"
          From: "transform opacity-100 scale-100"
          To: "transform opacity-0 scale-95"
      -->
    <Transition>
      <div
        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none"
        role="menu"
        aria-orientation="vertical"
        aria-labelledby="user-menu-button"
        tabindex="-1"
        v-if="open"
      >
        <!-- Active: "bg-gray-100 outline-none", Not Active: "" -->
        <ProfileDropdownLink
          v-for="({ url, label }, index) in profileLinks"
          :key="index"
          :url="url"
          :label="label"
        />
        <LogoutBtn />
      </div>
    </Transition>
  </div>
</template>

<style scoped>
.v-enter-active {
  transition:
    opacity,
    scale 0.1s ease-out;
}

.v-leave-active {
  transition:
    opacity,
    scale 0.075s ease-in;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
  scale: 95%;
}
</style>
