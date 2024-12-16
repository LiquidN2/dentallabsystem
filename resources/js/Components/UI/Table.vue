<script setup>
defineProps({
  columns: Array,
  rows: Array,
});
</script>

<template>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
          <th
            scope="col"
            class="px-6 py-3"
            v-for="(column, index) in columns"
            :key="index"
            v-html="column"
          />
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
</template>
