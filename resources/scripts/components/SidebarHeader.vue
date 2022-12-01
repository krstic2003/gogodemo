<script setup lang="ts">
const emit = defineEmits(["close"]);
</script>

<template>
  <div class="flex justify-between px-3">
    <span class="text-lg font-semibold uppercase text-gray-700">
      <slot />
    </span>

    <button class="text-gray-400 hover:text-gray-600" @click="emit('close')">
      <svg fill="currentColor" width="16" height="16">
        <path
          d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"
        />
      </svg>
    </button>
  </div>
</template>
