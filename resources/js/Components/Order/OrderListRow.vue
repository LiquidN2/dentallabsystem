<script setup>
import { computed } from 'vue';

import Badge from '@/Components/UI/Badge.vue';
import Link from '@/Components/UI/Link.vue';

const { order } = defineProps({
  order: {
    type: Object,
    required: true,
  },
});

const productBadgeTheme = computed(() => {
  switch (order.product_category_id) {
    case '2': // Crowns & Bridges
      return 'yellow';

    case '3': // Implants
      return 'green';

    case '4': // Removable Prosthodontics
      return 'blue';

    case '1': // None
    default:
      return 'default';
  }
});

const productInfo = computed(() => {
  const productItemName =
    order.product_item_short_name ?? order.product_item_name;
  return `${order.product_category_short_name} > ${productItemName}`;
});
</script>

<template>
  <tr class="bg-white border-b hover:bg-gray-50">
    <!-- Order ID -->
    <td class="px-6 py-3">{{ order.id }}</td>

    <!-- Status -->
    <td class="px-6 py-3">{{ order.status }}</td>

    <!-- Customer Name & Code    -->
    <td class="px-6 py-4">
      <Link :url="`/customers/${order.customer_id}`">
        <span>{{ order.customer_name }}</span>
        <br />
        <span>({{ order.customer_code }})</span>
      </Link>
    </td>

    <!-- Product Name & Digital-->
    <td class="px-6 py-4">
      <Badge :theme="productBadgeTheme" :label="productInfo" />
      <Badge v-if="order.digital" theme="red" label="Digital" class="ml-2" />
    </td>
  </tr>
</template>
