<script setup>
import ItemForm from '@/Components/Product/ItemForm.vue';
import ProductsPageLayout from '@/Layouts/Pages/ProductsPageLayout.vue';

defineProps({
  productCategories: Object,
});
</script>

<template>
  <ProductsPageLayout title="New Product Item">
    <template #heading> New Product Item </template>

    <template #default>
      <ItemForm :productCategories="productCategories" />
    </template>
  </ProductsPageLayout>
</template>
