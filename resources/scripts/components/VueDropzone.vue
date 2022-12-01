<script setup lang="ts">
import { ref, onMounted } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";

import { MediaImageSchema } from "../types/Image";
import { useBookStore } from "../stores/book";

import Dropzone from "dropzone";
import SidebarImagePreview from "./SidebarImagePreview.vue";
import { z } from "zod";

const dropRef = ref<HTMLDivElement | null>(null);
const dropzone = ref<Dropzone | null>(null);

const store = useBookStore();

onMounted(() => {
  if (dropRef.value !== null) {
    dropzone.value = new Dropzone(dropRef.value, {
      paramName: "images",
      uploadMultiple: true,
      withCredentials: true,
      url: `http://localhost:8000/books/${store.book.id}/images`,
      method: "POST",
      parallelUploads: 2,
      createImageThumbnails: false,

      // Add authentication token
      sending: function (_, __, formData) {
        formData.append("_token", usePage().props.value.test as string);
      },

      successmultiple(_, response) {
        store.addImage(z.array(MediaImageSchema).parse(response));
      },
    });
  }
});

function addImages() {
  dropzone.value?.hiddenFileInput?.click();
}
</script>

<template>
  <div class="flex flex-col h-full overflow-hidden gap-y-4">
    <div class="px-3">
      <button
        @click="addImages"
        class="text-white px-4 py-1 mb-2 rounded w-full h-9"
        style="background-color: #6c62a1"
      >
        Dodaj Fotografije
      </button>
    </div>

    <div ref="dropRef" v-show="false"></div>

    <div class="tmp-sc h-full overflow-y-auto px-3">
      <div v-if="store.bookImages.length" class="gridd flex flex-wrap gap-1">
        <SidebarImagePreview
          v-for="(image, i) in store.bookImages"
          :key="i"
          :image="image"
        />
      </div>

      <div
        v-else
        class="flex flex-col items-center justify-center gap-y-6 pb-48 h-full cursor-pointer border-dashed border-2 border-gray-300"
        @click="addImages"
      >
        <img src="/img/image-upload.svg" class="w-3/4" />

        <p class="text-center font-semibold text-2xl text-gray-600">
          Drag & Drop
        </p>
      </div>
    </div>
  </div>
</template>

<style>
.tmp-sc {
  direction: rtl;
}

.tmp-sc::-webkit-scrollbar {
  height: 5px;
  width: 5px;
}

.tmp-sc::-webkit-scrollbar-track-piece {
  background-color: transparent;
}

.tmp-sc::-webkit-scrollbar-thumb {
  background-color: #b3b3b3;
  outline: none;
  border: none;
  border-radius: 2px;
}

.tmp-sc::-webkit-scrollbar-thumb:hover {
  background-color: #909090;
}

.gridd {
  flex-wrap: wrap;
  --height: 150; /* Minimal row height */
  --ratio: 1; /* Default aspect ratio for photos that are not loaded yet */
}

.placeholder {
  flex-grow: 99999;
}
</style>
