<script setup>
import { ref, onMounted } from "vue";
import { useDropzone } from "vue3-dropzone";
import Dropzone from "dropzone";

import { usePageStore } from "../stores/page";

const props = defineProps({
  book: Object,
});

const page = usePageStore();

const url = "/upload-image/8"; // Your url on the server side
const saveFiles = (files) => {
  const formData = new FormData(); // pass data as a form

  for (var x = 0; x < files.length; x++) {
    // append files as array to the form, feel free to change the array name
    formData.append("images[]", files[x]);
  }

  axios
    .post(url, formData, {
      headers: {
        "Content-Type": "multipart/form-data",
      },
    })
    .then((response) => {
      images.value.push(...response.data);
    })
    .catch((err) => {
      console.error(err);
    });
};

function onDrop(acceptFiles, rejectReasons) {
  saveFiles(acceptFiles);
}

const { getRootProps, getInputProps, ...rest } = useDropzone({
  onDrop,
});

function imageSelected(image) {
  page.images.push(image);
}

const images = ref([]);
</script>

<template>
  <div class="flex flex-col gap-y-2 h-full">
    <button
      @click="open"
      class="text-gray-800 text-white px-4 py-1 rounded w-full"
      style="background-color: #6c62a1"
    >
      Dodaj Fotografije
    </button>

    <div ref="dropZoneHTML"></div>

    <div v-if="props.book.images.length" class="flex flex-col gap-y-4">
      <div
        v-for="image in props.book.images"
        :key="image.file_name"
        class="w-full h-auto border-gray-500 border-1 hover:drop-shadow-lg cursor-pointer"
        @click="imageSelected(image.original_url)"
      >
        <img :src="image.original_url" />
      </div>
    </div>

    <div
      v-else
      v-bind="getRootProps()"
      class="flex items-center justify-center text-center rounded border-dashed border-2 border-gray-400 h-full"
    >
      <input v-bind="getInputProps()" />

      <p v-if="isDragActive">Drop the files here ...</p>
      <p v-else>Drag 'n' drop some files here, or click to select files</p>
    </div>
  </div>
</template>
