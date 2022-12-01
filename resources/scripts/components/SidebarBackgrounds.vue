<script setup lang="ts">
// TODO: hook into the book store, and get currently selecteds page background
import { ref } from "vue";
import Colors from "@/scripts/stores/colors";
import SidebarHeader from "./SidebarHeader.vue";
import { usePageStore } from "@/scripts/stores/page";

const colors = ref(Colors);

const { updatePageBackground } = usePageStore();
</script>

<template>
  <div class="sidebar-content sidebar-tab grid gap-4 h-full px-6 py-4">
    <SidebarHeader>Pozadine</SidebarHeader>

    <div class="sidebar-content__colors grid grid-cols-5 gap-2 overflow-y-auto">
      <button
        v-for="(color, i) in colors"
        :key="i"
        class="flex rounded p-0.5 border border-gray-300 ease-in duration-100"
        @click="updatePageBackground(color)"
      >
        <div class="h-full w-full rounded" :style="{ background: color }"></div>
      </button>
    </div>
  </div>
</template>

<style>
.sidebar-content {
  grid-template-rows: auto 1fr;
}

.sidebar-content__colors {
  grid-auto-rows: 40px;
}
</style>
