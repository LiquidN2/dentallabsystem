<script setup>
import { computed } from 'vue';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Link from '@/Components/UI/Link.vue';
import Pagination from '@/Components/UI/Pagination.vue';
import SearchFilter from '@/Components/Customer/SearchFilter.vue';
import StatusBadge from '@/Components/UI/StatusBadge.vue';

const { customers } = defineProps({
  customers: Object,
});

const data = computed(() => customers?.data || []);
const pagination = computed(() => {
  if (!customers) return null;
  const { data, ...paginationObj } = customers;
  return paginationObj;
});
</script>

<template>
  <AuthenticatedLayout title="Customers">
    <template #heading>Customers</template>

    <template #links>
      <Link :isButton="true" href="/customers/create">New Customer</Link>
    </template>

    <template #default>
      <div class="mt-6 mb-12">
        <SearchFilter />
      </div>

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
              <th scope="col" class="px-6 py-3">Status</th>
              <th scope="col" class="px-6 py-3">Contact</th>
              <th scope="col" class="px-6 py-3">Address</th>
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
                status,
                email,
                phone,
                address,
                city,
                postcode,
              } in data"
              :key="id"
            >
              <td class="px-6 py-4">{{ id }}</td>
              <td class="px-6 py-4">{{ code }}</td>
              <td class="px-6 py-4 font-medium text-gray-900">
                <Link :href="`/customers/${id}`">
                  {{ name }}
                </Link>
              </td>
              <td class="px-6 py-4">
                <StatusBadge :status="status" />
              </td>
              <td class="px-6 py-4">
                <span>📧 {{ email }}</span> <br />
                <span>☎️ {{ phone }}</span>
              </td>
              <td class="px-6 py-4">
                <span>{{ address }}</span> <br />
                <span>{{ city }}, {{ postcode }}</span>
              </td>
              <td class="px-6 py-4 text-right">
                <Link :href="`/customers/${id}/edit`">Edit</Link>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="my-4" v-if="data.length > 0">
        <Pagination :pagination="pagination" />
      </div>
    </template>
  </AuthenticatedLayout>
</template>
