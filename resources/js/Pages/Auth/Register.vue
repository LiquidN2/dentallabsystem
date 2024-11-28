<script setup>
import { useForm } from '@inertiajs/vue3';

import Button from '@/Components/UI/Button.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Input from '@/Components/UI/Input.vue';
import InputError from '@/Components/UI/InputError.vue';
import Label from '@/Components/UI/Label.vue';
import Link from '@/Components/UI/Link.vue';

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
});
</script>

<template>
  <GuestLayout title="Register a New User Account">
    <template #heading>Register a New User Account</template>

    <template #default>
      <form class="space-y-6" @submit.prevent="form.post('/register')">
        <div class="[&>:not(:last-child)]:mb-2">
          <Label for="name">Name</Label>
          <Input id="name" type="text" v-model="form.name" />
          <InputError :error="form.errors.name" />
        </div>

        <div class="[&>:not(:last-child)]:mb-2">
          <Label for="email">Email</Label>
          <Input id="email" type="email" v-model="form.email" />
          <InputError :error="form.errors.email" />
        </div>

        <div class="[&>:not(:last-child)]:mb-2">
          <Label for="password">Password</Label>
          <Input id="password" type="password" v-model="form.password" />
          <InputError :error="form.errors.password" />
        </div>

        <div class="[&>:not(:last-child)]:mb-2">
          <Label for="password-confirmation">Password Confirmation</Label>
          <Input
            id="password-confirmation"
            type="password"
            v-model="form.password_confirmation"
          />
          <InputError :error="form.errors.password" />
        </div>

        <div>
          <Button type="submit" :class="'w-full'">Register</Button>
        </div>
      </form>

      <p class="mt-10 text-center text-sm/6 text-gray-500">
        Already a member?
        <Link href="/login">Login</Link>
      </p>
    </template>
  </GuestLayout>
</template>
