<script setup>
import { onMounted, ref, watch } from 'vue';
import {
  Listbox,
  ListboxButton,
  ListboxOptions,
  ListboxOption,
} from '@headlessui/vue';
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid';

const { options } = defineProps({
  options: Array,
});
const selected = defineModel();
const selectedOptionLabel = ref('');

const updateSelectedOptionLabel = value => {
  const option = options.find(option => option.value === value);
  selectedOptionLabel.value = option?.label || '';
};

onMounted(() => {
  try {
    updateSelectedOptionLabel(selected.value);
  } catch (error) {
    console.log(error);
  }
});

watch(selected, value => {
  updateSelectedOptionLabel(value);
});
</script>

<template>
  <div class="w-72">
    <Listbox v-model="selected">
      <div class="relative mt-1">
        <ListboxButton
          class="relative w-full cursor-default rounded-lg bg-white py-2 pl-3 pr-10 text-left text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
        >
          <span class="block truncate">{{ selectedOptionLabel }}</span>
          <span
            class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2"
          >
            <ChevronUpDownIcon
              class="h-5 w-5 text-gray-400"
              aria-hidden="true"
            />
          </span>
        </ListboxButton>

        <transition
          leave-active-class="transition duration-100 ease-in"
          leave-from-class="opacity-100"
          leave-to-class="opacity-0"
        >
          <ListboxOptions
            class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black/5 focus:outline-none sm:text-sm"
          >
            <ListboxOption
              v-slot="{ active, selected }"
              v-for="option in options"
              :key="option.value"
              :value="option.value"
              as="template"
            >
              <li
                :class="[
                  active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                  'relative cursor-default select-none py-2 pl-10 pr-4',
                ]"
              >
                <span
                  :class="[
                    selected ? 'font-medium' : 'font-normal',
                    'block truncate',
                  ]"
                  >{{ option.label }}</span
                >
                <span
                  v-if="selected"
                  class="absolute inset-y-0 left-0 flex items-center pl-3"
                  :class="{
                    'text-white': active,
                    'text-indigo-600': !active,
                  }"
                >
                  <CheckIcon class="h-5 w-5" aria-hidden="true" />
                </span>
              </li>
            </ListboxOption>
          </ListboxOptions>
        </transition>
      </div>
    </Listbox>
  </div>
</template>
