<script setup lang="ts">
import { Book } from "@/scripts/stores/book";
import { storeToRefs } from "pinia";
import { usePageStore } from "../stores/page";
import BookEditorHeader from "../components/BookEditorHeader.vue";
import BookEditorSidebar from "../components/BookEditorSidebar.vue";
import PixiBookEditorButtons from "@/scripts/components/PixiBookEditorButtons.vue";
import AlbumPage from "@/scripts/components/AlbumPage.vue";
import AlbumSpine from "@/scripts/components/AlbumSpine.vue";
import AlbumPageDivide from "@/scripts/components/AlbumPageDivide.vue";

const props = defineProps<{
  book: Book;
}>();

const store = usePageStore();

const { isSpineVisible, spine, visiblePages, pages, firstPage, secondPage } =
  storeToRefs(store);

const { selectPage, turnThePage, turnBackThePage } = store;
</script>

<template>
  <div class="book-editor h-screen w-screen grid overflow-hidden">
    <BookEditorHeader :book="props.book" />

    <div class="book-editor__main grid">
      <BookEditorSidebar />

      <!-- <div @drop.prevent="onDragDrop" @dragenter.prevent @dragover.prevent> -->
      <section class="grid gap-4 pb-4" style="grid-template-rows: auto 1fr">
        <PixiBookEditorButtons />

        <div class="flex justify-center items-center m4 relative">
          <button v-if="firstPage != 0" class="mr-4" @click="turnBackThePage">
            <img src="/img/prethodna.png" />
          </button>

          <AlbumSpine v-if="isSpineVisible" :value="spine" />

          <div class="h-full flex border drop-shadow">
            <AlbumPage
              v-for="page in visiblePages"
              :value="page"
              :key="page.page"
              @click="selectPage(page)"
            />
          </div>

          <AlbumPageDivide :value="visiblePages" />

          <button
            v-if="pages.length != secondPage"
            class="ml-4"
            @click="turnThePage"
          >
            <img src="/img/sledeca.png" />
          </button>
        </div>
      </section>
    </div>
  </div>
</template>

<style>
/* NOTE: new styles */
/* .book-editor { */
/*   grid-template-rows: 80px calc(100vh - 80px); */
/* } */

.book-editor__main {
  grid-template-columns: auto 1fr;
}
</style>
