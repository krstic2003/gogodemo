<script setup lang="ts">
import { ref, onMounted } from "vue";
import Image from "../types/Image";

const props = defineProps<{
  image: Image;
}>();

const rootEl = ref<HTMLDivElement | null>(null);

// Set the css variable for ratio
onMounted(() => {
  rootEl.value?.style.setProperty(
    "--ratio",
    `${
      props.image.custom_properties.height / props.image.custom_properties.width
    }`
  );
});

function onDragStart(e: DragEvent) {
  if (!e.dataTransfer) return;

  e.dataTransfer.effectAllowed = "move";
  // e.dataTransfer.setData("image_id", `${props.image.id}`);
  e.dataTransfer.setData("text/plain", JSON.stringify(props.image));

  if (rootEl.value) {
    e.dataTransfer.setDragImage(rootEl.value, e.offsetX, e.offsetY);
  }
}
</script>

<template>
  <div
    ref="rootEl"
    class="dropzone-image hover:shadow-md hover:cursor-grab relative"
    draggable="true"
    @dragstart="onDragStart"
  >
    <img
      :src="props.image.original_url"
      class="min-h-full min-w-full absolute object-cover object-center"
    />
    <button class="dropzone-image__remove">
      <img src="/img/remove.png" />
    </button>
  </div>
</template>

<style>
.dropzone-image {
  flex: calc(var(--height) / var(--ratio));
  min-width: calc(var(--height) / var(--ratio) * 1px);
  font-size: 0;
  height: 200px;
  max-height: 200px;
  overflow: hidden;
  box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
}

.dropzone-image:hover .dropzone-image__remove {
  display: inline-flex;
}

.dropzone-image__remove {
  position: absolute;
  display: none;
  justify-content: center;
  align-items: center;
  width: 28px;
  height: 28px;
  background: white;
  border-radius: 100%;
  bottom: 4px;
  right: 4px;
}

.dropzone-image__remove img {
  height: 20px;
  width: 20px;
}
</style>
