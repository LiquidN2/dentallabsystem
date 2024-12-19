<script setup>
import { useListingData } from '@/Composables/page.js';
import { CheckIcon } from '@heroicons/vue/20/solid';

import Badge from '@/Components/UI/Badge.vue';
import Link from '@/Components/UI/Link.vue';
import Pagination from '@/Components/UI/Pagination.vue';
import ProductsPageLayout from '@/Layouts/Pages/ProductsPageLayout.vue';

const { products = undefined } = defineProps({
  products: Object,
});

const { data = [], pagination } = useListingData(products);

const productCategoryTheme = catId => {
  switch (catId) {
    case 2:
      return 'yellow';

    case 3:
      return 'green';

    case 4:
      return 'blue';

    case 1:
    default:
      return 'default';
  }
};
</script>

<template>
  <ProductsPageLayout title="Product Items">
    <template #heading>Product Items</template>

    <template #links>
      <Link :isButton="true" href="/products/items/create">
        Add Product Item
      </Link>
    </template>

    <template #default>
      <div
        class="relative overflow-x-auto shadow-md sm:rounded-lg"
        v-if="data.length > 0"
      >
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-right">Available</th>
              <th scope="col" class="px-6 py-3 text-right">ID</th>
              <th scope="col" class="px-6 py-3">Code</th>
              <th scope="col" class="px-6 py-3">Name</th>
              <th scope="col" class="px-6 py-3">Category</th>
              <th scope="col" class="px-6 py-3 text-right">Turnaround Time</th>
              <th scope="col" class="px-6 py-3 text-right">Action</th>
            </tr>
          </thead>

          <tbody>
            <template
              v-for="{
                id,
                code,
                name,
                short_name,
                product_category_name,
                product_category_id,
                turnaround_time,
                available,
              } in data"
              :key="id"
            >
              <tr
                class="border-b"
                :class="{
                  'bg-white hover:bg-gray-50': available,
                  '!bg-gray-50 !text-gray-300': !available,
                }"
              >
                <td class="px-6 py-4 flex justify-end">
                  <CheckIcon class="size-4 text-indigo-600" v-if="available" />
                </td>
                <td class="px-6 py-4 text-right">{{ id }}</td>
                <td class="px-6 py-4">{{ code }}</td>
                <td
                  class="px-6 py-4 font-medium"
                  :class="{
                    'text-gray-900': available,
                    'text-gray-300': !available,
                  }"
                >
                  {{ name }}
                  <span v-if="short_name">({{ short_name }})</span>
                </td>
                <td class="px-6 py-4">
                  <Badge
                    :theme="productCategoryTheme(product_category_id)"
                    :label="product_category_name"
                    v-if="available"
                  />
                  <Badge
                    theme="disabled"
                    :label="product_category_name"
                    v-else
                  />
                </td>
                <td class="px-6 py-4 text-right">{{ turnaround_time }}</td>
                <td class="px-6 py-4 text-right">
                  <Link :href="`/products/items/${id}/edit`">Edit</Link>
                </td>
              </tr>
            </template>
          </tbody>
        </table>
      </div>

      <div class="my-4" v-if="data.length > 0">
        <Pagination :pagination="pagination" />
      </div>
    </template>
  </ProductsPageLayout>
</template>
