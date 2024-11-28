<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Link from '@/Components/UI/Link.vue';
import Pagination from '@/Components/UI/Pagination.vue';

const { customers } = defineProps({
  customers: Object,
});

const { data, ...pagination } = customers;
</script>

<template>
  <AuthenticatedLayout title="Customers">
    <template #heading>Customers</template>

    <template #default>
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3">ID</th>
              <th scope="col" class="px-6 py-3">Code</th>
              <th scope="col" class="px-6 py-3">Name</th>
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
                {{ name }}
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

      <div class="my-4">
        <Pagination :pagination="pagination" />
      </div>
    </template>
  </AuthenticatedLayout>
</template>

<style scoped></style>
