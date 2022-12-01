<script setup lang="ts">
import SidebarContent from "./SidebarContent.vue";
import SidebarHeader from "./SidebarHeader.vue";
import TemplateData from "../stores/template.json";
import { ref } from "vue";
import { usePageStore } from "@/scripts/stores/page";

const templates = ref(TemplateData.templates);

const { updatePage } = usePageStore();

function useTemplate(template) {
  updatePage(
    template.positions.map((val) => {
      return { image: "/img/image-placeholder.jpg", positions: val };
    })
  );
}
</script>

<template>
  <SidebarContent>
    <SidebarHeader>Sablon</SidebarHeader>

    <div class="grid grid-cols-2 gap-2 px-4 overflow-y-auto pt-1">
      <div
        v-for="(template, i) in templates"
        :key="i"
        class="bg-blue-400 cursor-pointer"
        style="box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;"
        @click="useTemplate(template)"
      >
        <img :src="`/templates${template.img}`" alt="" />
      </div>
    </div>
  </SidebarContent>
</template>
