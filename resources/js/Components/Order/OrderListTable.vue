<script setup>
import OrderListRow from '@/Components/Order/OrderListRow.vue';

defineProps({
  orders: Array,
});
</script>

<template>
  <div
    class="relative overflow-visible shadow-md sm:rounded-lg"
    v-if="orders.length > 0"
  >
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
          <th scope="col" class="px-6 py-3">Number</th>
          <th scope="col" class="px-6 py-3">Status</th>
          <th scope="col" class="px-6 py-3">Details</th>
          <th scope="col" class="px-6 py-3">Documents</th>
          <th scope="col" class="px-6 py-3">Timeline</th>
          <th scope="col" class="px-6 py-3 text-center">Actions</th>
        </tr>
      </thead>

      <tbody>
        <template v-for="order in orders" :key="order.id">
          <OrderListRow :order="order" />
        </template>
      </tbody>
    </table>
  </div>
</template>
