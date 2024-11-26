<script setup>
import { useForm } from '@inertiajs/vue3';

import Button from '@/Components/UI/Button.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Input from '@/Components/UI/Input.vue';
import InputError from '@/Components/UI/InputError.vue';
import Label from '@/Components/UI/Label.vue';
import Link from '@/Components/UI/Link.vue';

const form = useForm({
  email: '',
  password: '',
  remember: false,
});
</script>

<template>
  <GuestLayout title="Login">
    <template #heading>Log Into Your Account</template>

    <template #default>
      <form class="space-y-6" @submit.prevent="form.post('/login')">
        <div class="[&>:not(:last-child)]:mb-2">
          <Label for="email">Email</Label>
          <Input id="email" type="text" v-model="form.email" />
          <InputError :error="form.errors.email" />
        </div>

        <div class="[&>:not(:last-child)]:mb-2">
          <div class="flex items-center justify-between">
            <Label for="password">Password</Label>
            <div class="text-sm">
              <Link href="/forgotpassword">Forgot Password</Link>
            </div>
          </div>
          <Input id="password" type="password" v-model="form.password" />
          <InputError :error="form.errors.password" />
        </div>

        <div>
          <Button type="submit" :class="'w-full'">Login</Button>
        </div>
      </form>

      <p class="mt-10 text-center text-sm/6 text-gray-500">
        Not a member?
        <Link href="/register">Register an Account</Link>
      </p>
    </template>
  </GuestLayout>
</template>
