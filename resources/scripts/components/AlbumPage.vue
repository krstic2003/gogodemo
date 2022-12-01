<script setup lang="ts">
import { computed, ref } from "vue";
import { storeToRefs } from "pinia";
import { usePageStore } from "@/scripts/stores/page";
import { useResizeObserver } from "@vueuse/core";
// import { useBookStore } from "../stores/book";

import ImageWrapper from "../components/ImageWrapper.vue";

const props = defineProps({
  value: Object,
});

const store = usePageStore();

const { selectedPage } = storeToRefs(store);
const { appendToPage } = store;

const isPageSelected = computed(() => {
  return selectedPage.value?.page === props.value.page;
});

const pageRef = ref();
const pageHeight = ref(0);
const pageWidth = ref(0);

useResizeObserver(pageRef, (entries) => {
  const entry = entries[0];
  const { width, height } = entry.contentRect;

  pageHeight.value = height;
  pageWidth.value = width;
});

function onDragDrop(e) {
  const img = JSON.parse(e.dataTransfer.getData("text/plain"));

  let offsetX = (e.offsetX * 100) / e.target.clientWidth;
  let offsetY = (e.offsetY * 100) / e.target.clientHeight;

  const newImage = ref({
    image: img.original_url,
    positions: {
      start_x: offsetX,
      start_y: offsetY,
      width: 30,
      height: 50,
    },
  });

  console.log(newImage)

  appendToPage(newImage.value);
}
</script>

<template>
  <div
    ref="pageRef"
    class="album-page bg-white relative h-full box-content"
    :style="{ backgroundColor: props.value.background }"
    :class="{ 'album-page--selected': isPageSelected }"
    @drop.prevent="onDragDrop"
    @dragenter.prevent
    @dragover.prevent
  >
    <ImageWrapper
      v-if="props.value.content"
      v-for="(template, i) in props.value.content"
      :key="i"
      :value="template"
      :width="pageWidth"
      :height="pageHeight"
    />
  </div>
</template>

<style>
.album-page {
  width: 530px;
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
