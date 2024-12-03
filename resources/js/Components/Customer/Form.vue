<script setup>
import { Link, useForm } from '@inertiajs/vue3';

import Label from '@/Components/UI/Label.vue';
import Input from '@/Components/UI/Input.vue';
import InputError from '@/Components/UI/InputError.vue';
import Button from '@/Components/UI/Button.vue';

const { customer = undefined } = defineProps({
  customer: Object,
});

const form = useForm({
  name: customer?.name || '',
  code: customer?.code || '',
  email: customer?.email || '',
  phone: customer?.phone || '',
  address: customer?.address || '',
  address2: customer?.address2 || '',
  city: customer?.city || '',
  postcode: customer?.postcode || '',
  state: customer?.state || '',
});

const submit = () => {
  if (customer) {
    form.put(`/customers/${customer.id}`);
    return;
  }

  form.post('/customers');
};
</script>

<template>
  <form @submit.prevent="submit">
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base/7 font-semibold text-gray-900">
          Customer Information
        </h2>
        <p class="mt-1 text-sm/6 text-gray-600">
          Provide customer information in the form below
        </p>

        <div class="mt-10 divide-y divide-gray-100 border-t border-gray-100">
          <!-- Customer Name -->
          <div
            class="grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-4 py-6 items-center"
          >
            <Label for="name" class="sm:col-span-1">Customer Name</Label>
            <div class="sm:col-span-3 grid grid-cols-1 gap-x-6 sm:grid-cols-4">
              <Input
                id="name"
                type="text"
                class="sm:col-span-3"
                v-model="form.name"
              />
            </div>
            <InputError
              :error="form.errors.name"
              class="sm:col-start-2 sm:col-end-[-1]"
            />
          </div>

          <!-- Customer Code / Account No. -->
          <div
            class="grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-4 py-6 items-center"
          >
            <Label for="code" class="sm:col-span-1">
              Customer Code / Account Number
            </Label>
            <div
              class="sm:col-span-3 grid grid-cols-1 gap-x-6 sm:grid-cols-4 items-center"
            >
              <Input
                id="code"
                type="text"
                class="sm:col-span-1"
                v-model="form.code"
              />
            </div>
            <InputError
              :error="form.errors.code"
              class="sm:col-start-2 sm:col-end-[-1]"
            />
          </div>

          <!-- Email Address -->
          <div class="grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-4 py-6">
            <Label for="email" class="sm:col-span-1">Email Address</Label>
            <div class="sm:col-span-3 grid grid-cols-1 gap-x-6 sm:grid-cols-4">
              <Input
                id="email"
                type="email"
                class="sm:col-span-2"
                v-model="form.email"
              />
            </div>
            <InputError
              :error="form.errors.email"
              class="sm:col-start-2 sm:col-end-[-1]"
            />
          </div>

          <!-- Phone -->
          <div
            class="grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-4 py-6 items-center"
          >
            <Label for="phone" class="sm:col-span-1">Phone</Label>
            <div class="sm:col-span-3 grid grid-cols-1 gap-x-6 sm:grid-cols-4">
              <Input
                id="phone"
                type="text"
                class="sm:col-span-1"
                v-model="form.phone"
              />
            </div>
            <InputError
              :error="form.errors.phone"
              class="sm:col-start-2 sm:col-end-[-1]"
            />
          </div>

          <!-- Street Address -->
          <div
            class="grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-4 py-6 items-center"
          >
            <Label for="address" class="sm:col-span-1">Street Address</Label>
            <div class="sm:col-span-3 grid grid-cols-1 gap-x-6 sm:grid-cols-4">
              <Input
                id="address"
                type="text"
                class="sm:col-span-3"
                v-model="form.address"
              />
            </div>
            <InputError
              :error="form.errors.address"
              class="sm:col-start-2 sm:col-end-[-1]"
            />
          </div>

          <!-- Street Address 2 -->
          <div
            class="grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-4 py-6 items-center"
          >
            <Label for="address2" class="sm:col-span-1">Street Address 2</Label>
            <div class="sm:col-span-3 grid grid-cols-1 gap-x-6 sm:grid-cols-4">
              <Input
                id="address2"
                type="text"
                class="sm:col-span-3"
                v-model="form.address2"
              />
            </div>
            <InputError
              :error="form.errors.address2"
              class="sm:col-start-2 sm:col-span-2"
            />
          </div>

          <!-- City / Suburb -->
          <div
            class="grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-4 py-6 items-center"
          >
            <Label for="city" class="sm:col-span-1">City / Suburb</Label>
            <div class="sm:col-span-3 grid grid-cols-1 gap-x-6 sm:grid-cols-4">
              <Input
                id="city"
                type="text"
                class="sm:col-span-2"
                v-model="form.city"
              />
            </div>
            <InputError
              :error="form.errors.city"
              class="sm:col-start-2 sm:col-end-[-1]"
            />
          </div>

          <!-- State / Province -->
          <div
            class="grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-4 py-6 items-center"
          >
            <Label for="state" class="sm:col-span-1">State / Province</Label>
            <div class="sm:col-span-3 grid grid-cols-1 gap-x-6 sm:grid-cols-4">
              <Input
                id="state"
                type="text"
                class="sm:col-span-2"
                v-model="form.state"
              />
            </div>
            <InputError
              :error="form.errors.state"
              class="sm:col-start-2 sm:col-end-[-1]"
            />
          </div>

          <!-- ZIP / Postcode -->
          <div
            class="grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-4 py-6 items-center"
          >
            <Label for="postcode" class="sm:col-span-1">ZIP / Postcode</Label>
            <div class="sm:col-span-3 grid grid-cols-1 gap-x-6 sm:grid-cols-4">
              <Input
                id="postcode"
                type="text"
                class="sm:col-span-1"
                v-model="form.postcode"
              />
            </div>
            <InputError
              :error="form.errors.postcode"
              class="sm:col-start-2 sm:col-end-[-1]"
            />
          </div>
        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <Link
        :href="`/customers${customer ? `/${customer.id}` : ''}`"
        class="text-sm/6 font-semibold text-gray-900"
      >
        Cancel
      </Link>
      <Button type="submit">Save</Button>
    </div>
  </form>
</template>
