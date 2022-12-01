<script setup lang="ts">
import { ref, markRaw } from "vue";

import SidebarImages from "@/scripts/components/SidebarImages.vue";
import SidebarTemplates from "@/scripts/components/SidebarTemplates.vue";
import SidebarBackgrounds from "@/scripts/components/SidebarBackgrounds.vue";
import SidebarStickers from "@/scripts/components/SidebarStickers.vue";
import SidebarText from "@/scripts/components/SidebarText.vue";

const tabs = ref([
  {
    name: "images",
    label: "FOTOGRAFIJE",
    image: "/img/fotog.png",
    component: markRaw(SidebarImages),
  },
  {
    name: "templates",
    label: "ŠABLON",
    image: "/img/sabloni.png",
    component: markRaw(SidebarTemplates),
  },
  {
    name: "backgrounds",
    label: "POZADINE",
    image: "/img/pozadine.png",
    component: markRaw(SidebarBackgrounds),
  },
  {
    name: "stickers",
    label: "STIKERI",
    image: "/img/stikeri.png",
    component: markRaw(SidebarStickers),
  },
  {
    name: "text",
    label: "TEKST",
    image: "/img/tekstitem.png",
    component: markRaw(SidebarText),
  },
]);

const selectedTab = ref(tabs.value[0]);

function selectTab(index: number) {
  selectedTab.value = tabs.value[index];
}
</script>

<template>
  <section class="sidebar">
    <div class="flex flex-col text-black bg-gray-100">
      <button
        v-for="(tab, i) in tabs"
        :key="i"
        class="flex flex-col text-gray-600 items-center px-2 py-4 gap-y-2"
        :class="{ 'bg-white': tab.name === selectedTab?.name }"
        @click="selectTab(i)"
      >
        <img :src="tab.image" />
        <span>{{ tab.label }}</span>
      </button>
    </div>

    <div class="sidebar-tab-wrapper">
      <keep-alive>
        <component :is="selectedTab?.component" />
      </keep-alive>
    </div>
  </section>
</template>

<style>
.sidebar {
  @apply grid h-full border-r border-gray-300;

  grid-template-columns: auto minmax(auto, 333px);
}

.sidebar-tab-wrapper {
  @apply overflow-hidden;

  height: calc(100vh - 80px);
}
</style>
