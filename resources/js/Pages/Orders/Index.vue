<script setup>
import { useListingData } from '@/Composables/page.js';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Link from '@/Components/UI/Link.vue';
import OrderListTable from '@/Components/Order/OrderListTable.vue';

const { orders = undefined } = defineProps({
  orders: Object,
});

const { data = [], pagination } = useListingData(orders);
</script>

<template>
  <AuthenticatedLayout title="Orders">
    <template #heading>Orders</template>

    <template #links>
      <Link :isButton="true" href="/orders/create">New Order</Link>
    </template>

    <template #default>
      <OrderListTable :orders="data" />
    </template>
  </AuthenticatedLayout>
</template>
