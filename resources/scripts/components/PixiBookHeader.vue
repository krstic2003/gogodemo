<script setup>
const props = defineProps({
  book: Object,
});
</script>

<template>
  <div
    class="pixie-header flex justify-between items-center py-3 px-2 bg-white"
  >
    <!-- Logo -->
    <div class="shrink-0 flex items-center">
      <a href="#">
        <img src="/img/logo.png" alt="" width="270" height="59" />
      </a>
    </div>
    <div class="head-but">
      <div class="blef">{{ props.book.format }}</div>
      <div class="brig">
        {{ props.book.cover }}<br />{{ props.book.pages }} strana
      </div>
    </div>
    <div class="head-but head-but-wh">
      {{ $props.book.price }} <span>RSD</span>
    </div>

    <div class="pixie-header__nav flex gap-x-2">
      <img src="/images/header/sacuvaj.png" />
      <img src="/images/header/pogledaj.png" />
      <img src="/images/header/poruci.png" />
    </div>
  </div>
</template>

<style>
.pixie-header .head-but {
  height: auto !important;
  margin-top: 0;
}

.pixie-header__nav img {
  height: 38px;
}

.pixie-header .btn {
  margin-top: 0 !important;
}
</style>
