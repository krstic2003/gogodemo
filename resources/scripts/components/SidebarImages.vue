<script setup lang="ts">
import SidebarContent from "./SidebarContent.vue";
import SidebarHeader from "./SidebarHeader.vue";
import VueDropzone from "../components/VueDropzone.vue";
</script>

<template>
  <SidebarContent>
    <SidebarHeader>Fotografije</SidebarHeader>

    <VueDropzone></VueDropzone>
  </SidebarContent>
</template>
