<script setup lang="ts">
import { Book } from "@/scripts/stores/book";

defineProps<{
  book: Book;
}>();
</script>

<template>
  <header
    class="flex items-center justify-between border-b border-primary-light px-5"
  >
    <div class="book-editor-header__logo">
      <a href="/">
        <img src="/img/logo.png" width="270" height="59" />
      </a>
    </div>

    <div class="flex gap-x-8 items-center">
      <div
        class="flex items-center px-5 py-3 bg-primary-light text-primary rounded gap-x-1"
      >
        <div class="font-bold text-2xl leading-6">20x28</div>
        <div class="font-semibold text-xs leading-3 uppercase">
          {{ book.cover }}<br />{{ book.pages }} strana
        </div>
      </div>

      <div
        class="rounded border border-primary inline-flex px-5 py-3 items-end gap-x-2 text-primary"
      >
        <div class="font-bold text-2xl leading-6">{{ book.price }}</div>
        <div class="text-xs">RSD</div>
      </div>
    </div>

    <div class="book-editor-header__actions flex gap-x-4">
      <button
        class="bg-primary-light text-primary hover:opacity-90 transition-opacity"
      >
        Sačuvaj
      </button>
      <button
        class="bg-primary-light text-primary hover:opacity-90 transition-opacity"
      >
        Pogledaj
      </button>
      <button
        class="bg-green-400 text-white hover:opacity-90 transition-opacity"
      >
        Poruči
      </button>
    </div>
  </header>
</template>

<style>
.book-editor-header__actions button {
  @apply rounded px-5 py-3 font-bold uppercase tracking-wide;
}
</style>
