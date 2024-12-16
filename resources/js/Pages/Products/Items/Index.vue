<script setup>
import { useListingData } from '@/Composables/page.js';

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
              <th scope="col" class="px-6 py-3">ID</th>
              <th scope="col" class="px-6 py-3">Code</th>
              <th scope="col" class="px-6 py-3">Name</th>
              <th scope="col" class="px-6 py-3">Category</th>
              <th scope="col" class="px-6 py-3">Turnaround Time</th>
              <th scope="col" class="px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>

          <tbody>
            <tr
              class="bg-white border-b hover:bg-gray-50"
              v-for="{
                id,
                code,
                name,
                product_category_name,
                product_category_id,
                turnaround_time,
              } in data"
              :key="id"
            >
              <td class="px-6 py-4">{{ id }}</td>
              <td class="px-6 py-4">{{ code }}</td>
              <td class="px-6 py-4 font-medium text-gray-900">
                {{ name }}
              </td>
              <td class="px-6 py-4">
                <Badge
                  :theme="productCategoryTheme(product_category_id)"
                  :label="product_category_name"
                />
              </td>
              <td class="px-6 py-4">{{ turnaround_time }}</td>
              <td class="px-6 py-4 text-right">
                <Link :href="`/products/1/edit`">Edit</Link>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="my-4" v-if="data.length > 0">
        <Pagination :pagination="pagination" />
      </div>
    </template>
  </ProductsPageLayout>
</template>
