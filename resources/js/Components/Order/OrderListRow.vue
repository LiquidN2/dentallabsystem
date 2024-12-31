<script setup>
import { computed } from 'vue';
import { DateTime } from 'luxon';

import Badge from '@/Components/UI/Badge.vue';
import Link from '@/Components/UI/Link.vue';
import OrderActionsMenu from '@/Components/Order/OrderActionsMenu.vue';

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

const orderCreatedDate = computed(() => {
  return DateTime.fromISO(order.created_at).toFormat('dd/MM/yyyy');
});
</script>

<template>
  <tr class="bg-white border-b hover:bg-gray-50">
    <!-- Order ID -->
    <td class="px-6 py-3">{{ order.number }}</td>

    <!-- Status -->
    <td class="px-6 py-3">{{ order.status }}</td>

    <!-- Order Details -->
    <td class="px-6 py-4">
      <div class="grid grid-cols-[20px_minmax(0px,_1fr)] gap-x-3 gap-y-2">
        <!-- Customer Name & Number -->
        <div>🏢</div>
        <div>
          <Link :url="`/customers/${order.customer_id}`">
            <span>{{ order.customer_name }} [{{ order.customer_code }}]</span>
          </Link>
        </div>

        <!-- Dentist -->
        <div>👨‍⚕️</div>
        <div>{{ order.dentist }}</div>

        <!-- Patient -->
        <div>🙍‍♂️</div>
        <div class="text-gray-900 font-semibold">{{ order.patient }}</div>

        <!-- Product -->
        <div>🦷</div>
        <div>
          <Badge :theme="productBadgeTheme" :label="productInfo" />
          <Badge
            v-if="order.digital"
            theme="red"
            label="Digital"
            class="ml-2"
          />
        </div>
      </div>
    </td>

    <td class="px-6 py-4">
      <div class="grid grid-cols-[20px_minmax(0px,_1fr)] gap-x-3 gap-y-2">
        <!-- Order Form -->
        <div>📄</div>
        <div>
          <Link :url="`/labsheets/${order.id}`">Order Form</Link>
        </div>

        <!-- Invoice -->
        <div>💲</div>
        <div>
          <Link :url="`/invoices/${order.id}`">Invoice</Link>
        </div>
      </div>
    </td>

    <!-- Timeline -->
    <td class="px-6 py-4">
      <div class="grid grid-cols-[20px_minmax(0px,_1fr)] gap-x-3 gap-y-2">
        <div>📦</div>
        <div title="Order received date">{{ orderCreatedDate }}</div>
        <div>🚚</div>
        <div title="Estimated dispatch date" class="italic">
          Est. 28/12/2024
        </div>
        <div>👨‍⚕️</div>
        <div title="Customer requires this order by">03/01/2025</div>
      </div>
    </td>

    <td class="px-6 py-4">
      <div class="h-full w-full flex justify-center items-stretch">
        <OrderActionsMenu />
      </div>
    </td>
  </tr>
</template>
