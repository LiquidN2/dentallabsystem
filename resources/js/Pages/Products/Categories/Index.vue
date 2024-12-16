<script setup>
import Link from '@/Components/UI/Link.vue';
import ProductsPageLayout from '@/Layouts/Pages/ProductsPageLayout.vue';
</script>

<template>
  <ProductsPageLayout title="Product Categories">
    <template #heading> Product Categories</template>

    <template #links>
      <Link :isButton="true" href="/products/categories/create">
        Add Product Category
      </Link>
    </template>

    <template #default> Product Categories</template>
  </ProductsPageLayout>
</template>
