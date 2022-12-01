<script setup lang="ts">
import { computed, onMounted, ref } from "vue";
import { storeToRefs } from "pinia";
import { useBookStore } from "../stores/book";

import ImageWrapper from "../components/ImageWrapper.vue";

const bookStore = useBookStore();

const width = ref<number>(0);
const height = ref<number>(0);

onMounted(() => {
  const format = bookStore.book.format.match(/\((.*?)\)/)[1].split("x");

  width.value = format[0];
  height.value = format[1];
});

// const { selectedPage } = storeToRefs(bookStore);

// const isPageSelected = computed(() => {
//   return selectedPage.value?.page === props.value.page;
// });
</script>

<template>
  <div
    class="album-page max-h-full relative box-content bg-blue-400"
    :class="{ 'album-page--selected': false }"
    :style="{ aspectRatio: `${height} / ${width}` }"
  >
    <!-- <div v-if="props.value.selected"> -->
    <!--   <div v-for="image in store.images" :key="image"> -->
    <!--     <img :src="image" /> -->
    <!--   </div> -->
    <!-- </div> -->

    <!-- <ImageWrapper -->
    <!--   v-for="(image, i) in images" -->
    <!--   :key="i" -->
    <!--   :image="image" -->
    <!-- ></ImageWrapper> -->
  </div>
</template>

<style>
.album-page {
  max-width: 49%;
  flex-grow: 1;
}

.album-page--selected:only-child {
  box-shadow: -3px 4px 2px #6c6187, -3px -4px 2px #6c6187, 3px 4px 2px #6c6187,
    3px -4px 2px #6c6187;
}

.album-page--selected:not(:only-child):first-child {
  box-shadow: -3px 3px 2px #6c6187, -3px -3px 2px #6c6187;
}

.album-page--selected:not(:only-child):last-child {
  box-shadow: 3px 3px 2px #6c6187, 3px -3px 2px #6c6187;
}
</style>
