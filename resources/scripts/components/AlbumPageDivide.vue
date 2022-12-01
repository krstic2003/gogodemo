<script setup>
const props = defineProps({
  value: Array,
});
</script>

<template>
  <div
    v-show="props.value.length === 2"
    class="album-page-divide w-px absolute shadow-lg inset-0 h-full mx-auto bg-gray-200"
  />
</template>

<style>
.album-page-divide {
  box-shadow: 0px 0px 34px 2px rgb(229, 231, 235);
}
</style>
