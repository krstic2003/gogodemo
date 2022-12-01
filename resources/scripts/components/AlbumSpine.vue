<script setup>
import { ref } from "vue";
import VSwatches from "vue3-swatches";

const props = defineProps({
  value: Object,
});

const spineText = ref("");
const fontList = [
  "Abril Fatface",
  "Alex brush",
  "Allura",
  "Amatic SC",
  "Bebas Neue",
  "Birthstone",
  "Bonheur royal",
  "Butterfly kids",
  "Cinzel decorative",
  "Courgette",
  "Dancing script",
  "Fascinate",
  "Fleur de leah",
  "Great Vibes",
  "Grey Qo",
  "Gruppo",
  "Monoton",
  "Monte Carlo",
  "Old standard TT",
  "Open sans condensed",
  "Permanent marker",
  "Playfair display",
  "Point one",
  "PT Mono",
  "Qwigley",
  "Roboto condensed",
  "Rock salt",
  "Shadows into light",
  "Tulpen One",
  "Windsong",
];
</script>

<template>
  <div
    class="flex items-center justify-center h-full relative w-8 bg-white mr-4"
    :class="{ 'album-spine--selected': props.value.selected }"
  >
    <div class="album-spine-text">{{ spineText }}</div>

    <div
      v-show="props.value.selected"
      class="absolute flex flex-col gap-y-2 z-10 left-full ml-4 l-full bg-white p-4 drop-shadow-lg border-gray-200 border rounded"
      style="min-width: 350px"
    >
      <div>
        <label class="w-full">
          <span class="inline-block uppercase font-bold text-sm mb-2"
            >Kicmeni Text</span
          >
          <input
            v-model="spineText"
            type="text"
            placeholder="Kicmeni Text ide ovde"
            class="mt-1 block rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 w-full"
          />
        </label>
      </div>

      <div class="flex gap-x-2">
        <label class="block flex-grow">
          <select
            class="block w-full mt-1 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
          >
            <option v-for="font in fontList" :key="font">{{ font }}</option>
          </select>
        </label>
        <v-swatches
          value="#000000"
          popover-x="left"
          popover-y="down"
          swatches="text-advanced"
        ></v-swatches>
      </div>
    </div>
  </div>
</template>

<style>
.album-spine--selected {
  box-shadow: -3px 4px 2px #6c6187, -3px -4px 2px #6c6187, 3px 4px 2px #6c6187,
    3px -4px 2px #6c6187;
}

.album-spine-text {
  text-orientation: sideways;
  writing-mode: vertical-rl;
}
</style>
