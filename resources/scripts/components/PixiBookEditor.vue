<script setup>
import { storeToRefs } from "pinia";
import { usePageStore } from "../stores/page";

// Components
import AlbumPage from "./AlbumPage.vue";
import AlbumSpine from "./AlbumSpine.vue";
import AlbumPageDivide from "./AlbumPageDivide.vue";

import PixiBookEditorButtons from "./PixiBookEditorButtons.vue";
import PixiBookEditorMenu from "./PixiBookEditorMenu.vue";

const props = defineProps({
  book: Object,
});

const store = usePageStore();

const { isSpineVisible, spine, visiblePages, selectedPage } =
  storeToRefs(store);

const { selectPage, turnThePage, turnBackThePage } = store;
</script>

<template>
  <div class="pixi-book-editor grid">
    <PixiBookEditorMenu :value="selectedPage" :book="props.book" />

    <section class="grid gap-4 pb-4" style="grid-template-rows: auto 1fr">
      <PixiBookEditorButtons />

      <div class="flex justify-center items-center m4 relative">
        <button class="mr-4" @click="turnBackThePage">
          <img src="/img/prethodna.png" />
        </button>

        <AlbumSpine v-if="isSpineVisible" :value="spine" />

        <div class="h-full flex">
          <AlbumPage
            v-for="page in visiblePages"
            :value="page"
            :key="page.page"
            @click="selectPage(page)"
          />
        </div>

        <AlbumPageDivide :value="visiblePages" />

        <button class="ml-4" @click="turnThePage">
          <img src="/img/sledeca.png" />
        </button>
      </div>
    </section>
  </div>
</template>

<style>
.pixi-book-editor {
  grid-template-columns: 380px 1fr;
}
</style>
