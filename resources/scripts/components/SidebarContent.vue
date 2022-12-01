<template>
  <div class="sidebar-content grid gap-4 h-full py-3">
    <slot />
  </div>
</template>

<style>
.sidebar-content {
  grid-template-rows: auto 100%;
}
</style>
