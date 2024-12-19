<script setup>
import { Link, useForm } from '@inertiajs/vue3';

import Button from '@/Components/UI/Button.vue';
import ButtonDelete from '@/Components/UI/ButtonDelete.vue';
import Input from '@/Components/UI/Input.vue';
import InputError from '@/Components/UI/InputError.vue';
import InputSelect from '@/Components/UI/InputSelect.vue';
import Label from '@/Components/UI/Label.vue';
import ToggleSwitch from '@/Components/UI/ToggleSwitch.vue';

const { productItem = undefined, productCategories } = defineProps({
  productItem: Object,
  productCategories: Object,
});

const form = useForm({
  name: productItem?.name || '',
  code: productItem?.code || '',
  description: productItem?.description || '',
  turnaround_time: productItem?.turnaround_time || '',
  product_category_id: productItem?.product_category_id || 1,
  available: !!productItem?.available || false,
});

// const available = ref(false);

const submit = () => {
  if (productItem) {
    form.put(`/products/items/${productItem.id}`);
  } else {
    form.post('/products/items');
  }
};

const handleDelete = () => {
  console.log(`Deleting Product ID ${productItem.id}`);
};
</script>

<template>
  <form @submit.prevent="submit">
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base/7 font-semibold text-gray-900">
          Product Information
        </h2>
        <p class="mt-1 text-sm/6 text-gray-600">
          Provide product information in the form below
        </p>

        <div class="mt-10 divide-y divide-gray-100 border-t border-gray-100">
          <!-- Product Name -->
          <div
            class="grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-4 py-6 items-center"
          >
            <Label for="name" class="sm:col-span-1">Name</Label>
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

          <!-- Product Code -->
          <div
            class="grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-4 py-6 items-center"
          >
            <Label for="code" class="sm:col-span-1"> Code </Label>
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

          <!-- Product Category -->
          <div
            class="grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-4 py-6 items-center"
          >
            <Label for="status" class="sm:col-span-1">Category</Label>
            <InputSelect
              :options="productCategories"
              v-model="form.product_category_id"
            />
            <InputError
              :error="form.errors.product_category_id"
              class="sm:col-start-2 sm:col-end-[-1]"
            />
          </div>

          <!-- Turnaround Time -->
          <div
            class="grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-4 py-6 items-center"
          >
            <Label for="turnaround_time" class="sm:col-span-1">
              Turnaround Time
            </Label>
            <div
              class="sm:col-span-3 grid grid-cols-1 gap-x-6 sm:grid-cols-4 items-center"
            >
              <Input
                id="turnaround_time"
                type="text"
                class="sm:col-span-1"
                v-model="form.turnaround_time"
              />
            </div>
            <InputError
              :error="form.errors.turnaround_time"
              class="sm:col-start-2 sm:col-end-[-1]"
            />
          </div>

          <div
            class="grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-4 py-6 items-center"
          >
            <Label for="turnaround_time" class="sm:col-span-1">
              Available for Ordering
            </Label>
            <div
              class="sm:col-span-3 grid grid-cols-1 gap-x-6 sm:grid-cols-4 items-center"
            >
              <ToggleSwitch v-model="form.available" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-between gap-x-6">
      <ButtonDelete
        id="delete-product-item"
        :handlerEndpoint="`/products/items/${productItem.id}`"
        v-if="productItem"
      >
        Delete
      </ButtonDelete>

      <div class="flex items-center gap-x-6">
        <Link
          href="/products/items"
          class="text-sm/6 font-semibold text-gray-900"
        >
          Cancel
        </Link>
        <Button type="submit" :disabled="form.processing">Save</Button>
      </div>
    </div>
  </form>
</template>
