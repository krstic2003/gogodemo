<script setup lang="ts">
import VueDraggableResizable from "vue-draggable-resizable/src/components/vue-draggable-resizable.vue";
import "vue-draggable-resizable/src/components/vue-draggable-resizable.css";

const props = defineProps<{
  value: {
    positions: {
      height: number;
      width: number;
      start_x: number;
      start_y: number;
    };
    image: string;
  };
  height: number;
  width: number;
}>();

const calculate = (val: number, perc: number) => (val * perc) / 100;

function updatePostion(x: number, y: number) {
  console.log(x, y);
}

function onDragDrop(e: DragEvent) {
  const img = JSON.parse(e.dataTransfer.getData("text/plain"));

  props.value.image = img.original_url;
}
</script>

<template>
  <VueDraggableResizable
    :h="calculate(props.height, props.value.positions.height)"
    :w="calculate(props.width, props.value.positions.width)"
    :x="calculate(props.width, props.value.positions.start_x)"
    :y="calculate(props.height, props.value.positions.start_y)"
    @dragstop="updatePostion"
    class-name="image-component"
    class-name-handle="image-component-handle"
    class-name-active="image-component-active"
    @drop.stop="onDragDrop"
    @dragenter.prevent
    @dragover.prevent
  >
    <div class="w-full h-full relative overflow-hidden">
      <img
        :src="props.value.image"
        class="min-h-full min-w-full absolute object-cover object-center"
      />
    </div>
    <!-- TODO: Image that we will manipulate -->
    <!-- TODO: Placeholder when the image is not present (empty template) -->
    <!-- TODO: Add the dropdown menu, useing popper.js -->
  </VueDraggableResizable>
</template>

<style>
.image-component {
  display: flex;
  justify-content: center;
  cursor: pointer;
  position: fixed;
  border: 2px solid transparent;
}

.image-component-handle {
  position: absolute;
  background-color: #6c62a1;
  height: 14px;
  width: 14px;
  box-model: border-box;
  transition: all 300ms linear;
}

.image-component-handle-tl {
  top: -14px;
  left: -14px;
  cursor: nw-resize;
}

.image-component-handle-tm {
  top: -14px;
  left: 50%;
  margin-left: -7px;
  cursor: n-resize;
}

.image-component-handle-tr {
  top: -14px;
  right: -14px;
  cursor: ne-resize;
}

.image-component-handle-ml {
  top: 50%;
  margin-top: -7px;
  left: -14px;
  cursor: w-resize;
}

.image-component-handle-mr {
  top: 50%;
  margin-top: -7px;
  right: -14px;
  cursor: e-resize;
}

.image-component-handle-bl {
  bottom: -14px;
  left: -14px;
  cursor: sw-resize;
}

.image-component-handle-bm {
  bottom: -14px;
  left: 50%;
  margin-left: -7px;
  cursor: s-resize;
}

.image-component-handle-br {
  bottom: -14px;
  right: -14px;
  cursor: se-resize;
}

.image-component-handle-tl:hover,
.image-component-handle-tr:hover,
.image-component-handle-bl:hover,
.image-component-handle-br:hover {
  transform: scale(1.4);
}

.image-component-active {
  border: 2px solid #6c62a1;
}

.image-component-active:hover {
  cursor: move;
}

.image-component-active .image-component__menu {
  display: flex;
}
</style>
