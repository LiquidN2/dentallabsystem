<script setup>
import ItemForm from '@/Components/Product/ItemForm.vue';
import ProductsPageLayout from '@/Layouts/Pages/ProductsPageLayout.vue';

const { productItem, productCategories } = defineProps({
  productItem: Object,
  productCategories: Object,
});
</script>

<template>
  <ProductsPageLayout title="New Product Item">
    <template #heading> Edit Product Item</template>

    <template #default>
      <ItemForm
        :productCategories="productCategories"
        :productItem="productItem"
      />
    </template>
  </ProductsPageLayout>
</template>
