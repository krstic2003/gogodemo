import { computed, ref } from "vue";
import { defineStore } from "pinia";
import { z } from "zod";
import { usePage } from "@inertiajs/inertia-vue3";
import MediaImage, { MediaImageSchema } from "../types/Image";

export const BookSchema = z.object({
    id: z.number(),
    name: z.string(),
    format: z.string(),
    cover: z.string(),
    pages: z.string().transform((val) => Number.parseInt(val)),
    price: z.string().transform((val) => Number.parseFloat(val)),
    images: z.array(MediaImageSchema),
});

export type Book = z.infer<typeof BookSchema>;

export const useBookStore = defineStore("book", () => {
    const book = ref(BookSchema.parse(usePage().props.value.book));

    const bookImages = computed(() => {
        return book.value.images;
    });

    function addImage(images: MediaImage[]) {
        book.value.images.push(...images);
    }

    return {
        book,
        bookImages,
        addImage,
    };
});
