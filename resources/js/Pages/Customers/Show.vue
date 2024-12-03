<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Badge from '@/Components/UI/Badge.vue';
import Link from '@/Components/UI/Link.vue';
import DeleteButton from '@/Components/Customer/DeleteButton.vue';

const { customer } = defineProps({
  customer: Object,
});

const {
  id,
  name,
  code,
  status,
  email,
  phone,
  address,
  address2,
  city,
  postcode,
  state,
} = customer;
</script>

<template>
  <AuthenticatedLayout title="Customers">
    <template #heading>Customer Information</template>

    <template #links>
      <DeleteButton :customerId="id">Delete</DeleteButton>
      <Link :isButton="true" :href="`/customers/${id}/edit`"> Edit Info </Link>
    </template>

    <template #default>
      <div
        class="mb-6 text-sm font-medium text-center text-gray-500 border-b border-gray-100"
      >
        <ul class="flex flex-wrap -mb-px">
          <li class="me-2">
            <a
              href="#"
              class="inline-block p-4 text-indigo-600 border-b-2 border-indigo-600 rounded-t-lg active"
              aria-current="page"
              >General Info</a
            >
          </li>
          <li class="me-2">
            <a
              href="#"
              class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300"
              >Order History</a
            >
          </li>
          <li class="me-2">
            <a
              href="#"
              class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300"
              >Financial Info</a
            >
          </li>
          <li class="me-2">
            <a
              href="#"
              class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300"
              >Contacts</a
            >
          </li>
          <li class="me-2">
            <a
              href="#"
              class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300"
              >Notes</a
            >
          </li>
          <li class="me-2">
            <a
              href="#"
              class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300"
              >Settings</a
            >
          </li>
        </ul>
      </div>

      <div>
        <div class="px-4 sm:px-0">
          <h3 class="text-base/7 font-semibold text-gray-900">
            Customer Information
          </h3>
          <p class="mt-1 max-w-2xl text-sm/6 text-gray-500">
            Customer details & contact information.
          </p>
        </div>

        <div class="mt-6 border-t border-gray-100">
          <dl class="divide-y divide-gray-100">
            <!-- Customer Name -->
            <div class="px-4 py-6 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-0">
              <dt class="text-sm/6 font-medium text-gray-900">Customer Name</dt>
              <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-3 sm:mt-0">
                {{ name }}
              </dd>
            </div>

            <!-- Customer Code / Account No. -->
            <div class="px-4 py-6 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-0">
              <dt class="text-sm/6 font-medium text-gray-900">
                Customer Code / Account Number
              </dt>
              <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-3 sm:mt-0">
                {{ code }}
              </dd>
            </div>

            <!-- Status -->
            <div class="px-4 py-6 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-0">
              <dt class="text-sm/6 font-medium text-gray-900">Status</dt>
              <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-3 sm:mt-0">
                <Badge :status="status" class="!text-sm" />
              </dd>
            </div>

            <!-- Email Address -->
            <div class="px-4 py-6 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-0">
              <dt class="text-sm/6 font-medium text-gray-900">Email Address</dt>
              <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-3 sm:mt-0">
                {{ email }}
              </dd>
            </div>

            <!-- Phone -->
            <div class="px-4 py-6 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-0">
              <dt class="text-sm/6 font-medium text-gray-900">Phone</dt>
              <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-3 sm:mt-0">
                {{ phone }}
              </dd>
            </div>

            <!-- Street Address -->
            <div class="px-4 py-6 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-0">
              <dt class="text-sm/6 font-medium text-gray-900">
                Street Address
              </dt>
              <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-3 sm:mt-0">
                {{ address }}
              </dd>
            </div>

            <!-- Street Address 2 -->
            <div class="px-4 py-6 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-0">
              <dt class="text-sm/6 font-medium text-gray-900">
                Street Address 2
              </dt>
              <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-3 sm:mt-0">
                {{ address2 }}
              </dd>
            </div>

            <!-- City / Suburb -->
            <div class="px-4 py-6 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-0">
              <dt class="text-sm/6 font-medium text-gray-900">City / Suburb</dt>
              <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-3 sm:mt-0">
                {{ city }}
              </dd>
            </div>

            <!-- State / Province -->
            <div class="px-4 py-6 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-0">
              <dt class="text-sm/6 font-medium text-gray-900">
                State / Province
              </dt>
              <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-3 sm:mt-0">
                {{ state }}
              </dd>
            </div>

            <!-- ZIP / Postcode -->
            <div class="px-4 py-6 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-0">
              <dt class="text-sm/6 font-medium text-gray-900">
                ZIP / Postcode
              </dt>
              <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-3 sm:mt-0">
                {{ postcode }}
              </dd>
            </div>
          </dl>
        </div>
      </div>
    </template>
  </AuthenticatedLayout>
</template>
