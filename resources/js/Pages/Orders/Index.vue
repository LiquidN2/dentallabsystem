<script setup>
import { DocumentTextIcon } from '@heroicons/vue/24/outline';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Badge from '@/Components/UI/Badge.vue';
import StatusBadge from '@/Components/UI/StatusBadge.vue';
import Link from '@/Components/UI/Link.vue';

const data = [
  {
    id: '1234556789',
    customer: {
      name: 'Christiansen LLC',
      code: '15112',
    },
    patient: 'Jane Brown',
    dentist: 'Dr John Doe',
    status: 'processing',
    category: 'C&B > FMZir',
    digital: true,
    createdDate: '06/12/2024',
    estimatedDispatchedDate: '15/12/2024',
    dispatchedDate: null,
    invoiceDate: null,
  },
  {
    id: '759340959',
    customer: {
      name: 'Christiansen LLC',
      code: '15112',
    },
    patient: 'Peter White',
    dentist: 'Dr Adam Smith',
    status: 'dispatched',
    category: 'RP > Splint',
    digital: false,
    createdDate: '20/11/2024',
    estimatedDispatchedDate: '29/11/2024',
    dispatchedDate: '28/11/2024',
  },
];
</script>

<template>
  <AuthenticatedLayout title="Orders">
    <template #heading>Orders</template>

    <template #links>
      <Link :isButton="true" href="/orders/create">New Order</Link>
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
              <th scope="col" class="px-6 py-3">Customer</th>
              <th scope="col" class="px-6 py-3">Details</th>
              <th scope="col" class="px-6 py-3">Order Form</th>
              <th scope="col" class="px-6 py-3">Created Date</th>
              <th scope="col" class="px-6 py-3">Status</th>
              <th scope="col" class="px-6 py-3">WIP Queries</th>
              <th scope="col" class="px-6 py-3">Invoice</th>
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
                customer,
                patient,
                dentist,
                status,
                category,
                digital,
                createdDate,
                estimatedDispatchedDate,
                dispatchedDate,
              } in data"
              :key="id"
            >
              <td class="px-6 py-4">{{ id }}</td>
              <td class="px-6 py-4">
                <span>{{ customer.name }}</span>
                <br />
                <span>({{ customer.code }})</span>
              </td>
              <td class="px-6 py-4">
                <Badge theme="yellow" :label="category" />
                <Badge
                  v-if="digital"
                  theme="pink"
                  label="Digital"
                  class="!ml-2"
                />
                <br />
                for
                <span
                  class="font-medium text-gray-900"
                  title="patient id/name"
                  >{{ patient }}</span
                >
                <br />
                <span class="italic" title="name of treating doctor"
                  >(from {{ dentist }})</span
                >
              </td>

              <td class="px-6 py-4">
                <DocumentTextIcon class="size-6" />
              </td>

              <td class="px-6 py-4">{{ createdDate }}</td>

              <td class="px-6 py-4">
                <div>
                  <StatusBadge :status="status" />
                </div>

                <div class="mt-1">
                  <span v-if="dispatchedDate">{{ dispatchedDate }}</span>
                  <span v-else-if="estimatedDispatchedDate" class="italic">
                    Est. {{ estimatedDispatchedDate }}
                  </span>
                  <span v-else class="italic">Est. TBD</span>
                </div>
              </td>

              <td class="px-6 py-4"></td>
              <td class="px-6 py-4"></td>
              <td class="px-6 py-4 text-right">
                <Link :href="`/orders/${id}/edit`">Edit</Link>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </template>
  </AuthenticatedLayout>
</template>
