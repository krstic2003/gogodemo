<script setup>
import { ref } from "vue";
import ImageUpload from "./ImageUpload.vue";
import Sablon from "./Sablon.vue";
import Themes from "./Themes.vue";
import Stikeri from "./Stikeri.vue";
import Text from "./Text.vue";

const props = defineProps({
  value: Object,
  book: Object,
});

const tabs = [
  { id: 1, component: ImageUpload },
  { id: 2, component: Sablon },
  { id: 3, component: Themes },
  { id: 4, component: Stikeri },
  { id: 5, component: Text },
];

const selectedTab = ref(tabs[0]);
</script>

<template>
  <section class="sidebar">
    <div class="flex flex-col text-black bg-gray-100">
      <button
        class="flex flex-col text-gray-600 items-center px-2 py-4 gap-y-2"
        :class="{ 'sidebar-button--selected': selectedTab.id === 1 }"
        @click="() => (selectedTab = tabs[0])"
      >
        <img src="/img/slike.png" alt="" />
        FOTOGRAFIJE
      </button>

      <button
        class="flex flex-col text-gray-600 items-center px-2 py-4 gap-y-2"
        :class="{ 'sidebar-button--selected': selectedTab.id === 2 }"
        @click="() => (selectedTab = tabs[1])"
      >
        <img src="/img/sabloni.png" alt="" />
        ŠABLON
      </button>

      <button
        class="flex flex-col text-gray-600 items-center px-2 py-4 gap-y-2"
        :class="{ 'sidebar-button--selected': selectedTab.id === 3 }"
        @click="() => (selectedTab = tabs[2])"
      >
        <img src="/img/pozadine.png" alt="" />
        POZADINE
      </button>

      <button
        class="flex flex-col text-gray-600 items-center px-2 py-4 gap-y-2"
        :class="{ 'sidebar-button--selected': selectedTab.id === 4 }"
        @click="() => (selectedTab = tabs[3])"
      >
        <img src="/img/sticker.png" alt="" />
        STIKERI
      </button>

      <button
        class="flex flex-col text-gray-600 items-center px-2 py-4 gap-y-2"
        :class="{ 'sidebar-button--selected': selectedTab.id === 5 }"
        @click="() => (selectedTab = tabs[4])"
      >
        <img src="/img/text.png" alt="" />
        TEKST
      </button>
    </div>

    <div class="flex flex-col items-center px-4 py-6">
      <component
        :is="selectedTab.component"
        :value="value"
        :book="props.book"
      />
    </div>
  </section>
</template>

<style>
.sidebar {
  display: grid;
  grid-template-columns: auto 1fr;
  background-color: white;
}

.sidebar-button--selected {
  background-color: white;
}
</style>
