<script setup>
import { Link } from '@inertiajs/vue3';

const { pagination } = defineProps({
  pagination: Object,
});
</script>

<template>
  <div class="flex items-center justify-between bg-white py-3">
    <div class="flex flex-1 justify-between sm:hidden">
      <Link
        class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
        :class="{
          'bg-gray-50 pointer-events-none': !pagination?.prev_page_url,
        }"
        :href="pagination?.prev_page_url ?? ''"
      >
        Previous
      </Link>
      <Link
        class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
        :class="{
          'bg-gray-50 pointer-events-none': !pagination?.next_page_url,
        }"
        :href="pagination?.next_page_url ?? ''"
      >
        Next
      </Link>
    </div>
    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
      <div>
        <p class="text-sm text-gray-700">
          Showing
          <span class="font-medium">{{ pagination.from }}</span>
          to
          <span class="font-medium">{{ pagination.to }}</span>
          of
          <span class="font-medium">{{ pagination.total }}</span>
          results
        </p>
      </div>
      <div v-if="pagination.last_page > 1">
        <nav
          class="isolate inline-flex -space-x-px rounded-md shadow-sm"
          aria-label="Pagination"
        >
          <Link
            class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
            :class="{
              'bg-gray-50 pointer-events-none': !pagination?.prev_page_url,
            }"
            :href="pagination?.prev_page_url ?? ''"
          >
            <span class="sr-only">Previous</span>
            <svg
              class="size-5"
              viewBox="0 0 20 20"
              fill="currentColor"
              aria-hidden="true"
              data-slot="icon"
            >
              <path
                fill-rule="evenodd"
                d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z"
                clip-rule="evenodd"
              />
            </svg>
          </Link>

          <!-- Current: "z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->
          <template v-for="(link, index) in pagination.links" :key="index">
            <Link
              :href="link.url ?? ''"
              :aria-current="link.active ? 'page' : 'false'"
              v-html="link.label"
              class="relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold focus:z-20"
              :class="{
                'z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600':
                  link.active,
                'text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0':
                  !link.active,
              }"
              v-if="index !== 0 && index !== pagination.links.length - 1"
            >
            </Link>
          </template>

          <Link
            class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
            :class="{
              'bg-gray-50 pointer-events-none': !pagination?.next_page_url,
            }"
            :href="pagination?.next_page_url ?? ''"
          >
            <span class="sr-only">Next</span>
            <svg
              class="size-5"
              viewBox="0 0 20 20"
              fill="currentColor"
              aria-hidden="true"
              data-slot="icon"
            >
              <path
                fill-rule="evenodd"
                d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                clip-rule="evenodd"
              />
            </svg>
          </Link>
        </nav>
      </div>
    </div>
  </div>
</template>
