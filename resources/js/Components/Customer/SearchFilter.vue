<script setup>
import { onMounted, ref } from 'vue';
import { router } from '@inertiajs/vue3';

import {
  Listbox,
  ListboxButton,
  ListboxOptions,
  ListboxOption,
} from '@headlessui/vue';
import { ChevronUpDownIcon } from '@heroicons/vue/20/solid';

const options = [
  { id: 1, name: 'Code', value: 'code' },
  { id: 2, name: 'Name', value: 'name' },
  { id: 3, name: 'Phone', value: 'phone' },
  { id: 4, name: 'Email', value: 'email' },
];
const fields = options.map(option => option.value);

const selected = ref(options[0]);
const searchText = ref('');

onMounted(() => {
  const queryParams = new URLSearchParams(window.location.search);
  for (const field of fields) {
    if (queryParams.has(field)) {
      // Update the selected field from the query params
      selected.value = options.find(option => option.value === field);

      // Populate the search text from the query params
      searchText.value = queryParams.get(field);
      break;
    }
  }
});

const onSearch = () => {
  const data = searchText.value
    ? {
        search: 1,
        [`${selected.value.value}`]: searchText.value,
      }
    : {};

  router.get('/customers', data);
};
</script>

<template>
  <form id="searchForm" @submit.prevent="onSearch">
    <div
      class="relative flex items-center w-full max-w-md mx-auto border rounded-md shadow-sm"
    >
      <!-- Dropdown Select -->
      <div class="absolute inset-y-0 left-0 flex items-center">
        <label for="category" class="sr-only">Search Type</label>
        <Listbox
          v-model="selected"
          class="py-2 border-2 border-transparent rounded-md focus-within:border-indigo-500"
        >
          <div class="relative focus-within:relative">
            <ListboxButton
              class="flex items-center justify-between h-full w-[110px] py-0 pl-6 pr-8 text-gray-500 bg-transparent focus:border-indigo-500 focus:ring-indigo-500 rounded-l-md"
            >
              <span class="block truncate">{{ selected.name }}</span>
              <span
                class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2"
              >
                <ChevronUpDownIcon
                  class="h-5 w-5 text-gray-400"
                  aria-hidden="true"
                />
              </span>
            </ListboxButton>
            <Transition
              leave-active-class="transition duration-100 ease-in"
              leave-from-class="opacity-100"
              leave-to-class="opacity-0"
            >
              <ListboxOptions
                class="absolute mt-3 z-10 w-[110px] bg-white shadow-lg max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none"
              >
                <ListboxOption
                  v-for="option in options"
                  :key="option.id"
                  :value="option"
                  v-slot="{ active, selected }"
                  as="template"
                >
                  <li
                    class="cursor-default block select-none relative py-2 px-6"
                    :class="{
                      'text-indigo-600': selected,
                      'text-gray-900': !selected,
                      'bg-indigo-600 !text-white': active,
                    }"
                  >
                    <span
                      :class="{
                        'font-medium': selected,
                        'font-normal': !selected,
                      }"
                      class="block truncate"
                    >
                      {{ option.name }}
                    </span>
                  </li>
                </ListboxOption>
              </ListboxOptions>
            </Transition>
          </div>
        </Listbox>
      </div>

      <!-- Text Input -->
      <input
        type="text"
        name="search"
        id="search"
        class="w-full pl-36 pr-4 py-2 text-gray-900 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 border border-gray-300 rounded-md"
        placeholder="Search..."
        v-model="searchText"
      />
    </div>
  </form>
</template>
