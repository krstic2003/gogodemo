import { usePage } from "@inertiajs/inertia-vue3";
import { defineStore } from "pinia";
import { computed, ref } from "vue";
import { BookSchema } from "./book";

type PageTemplate = {
    empty: boolean;
    image: {
        url: string;
        zoom: number;
        angle: number;
        flip: boolean;
    };
    template: {
        height: number;
        width: number;
        start_x: number;
        start_y: number;
    };
};

type Page = {
    id: number;
    name: string;
    format: string;
    cover: string;
    pages: number;
    price: number;
    background: string;
    templates: PageTemplate[] | null;
    spine: {
        text: string;
        style: {
            color: string;
            fontSize: string;
            fontFamily: string;
        };
    };
    // TODO: Implement this one
    images: [];
};

export const usePageStore = defineStore("page", () => {
    const pages = ref([]);
    const spine = ref(undefined);

    const firstPage = ref(0);
    const secondPage = ref(1);

    const visiblePages = ref([]);
    const selectedPage = ref(null);

    const isSpineVisible = computed(() => {
        return spine.value && firstPage.value === 0;
    });

    function setVisiblePages() {
        visiblePages.value = pages.value.slice(
            firstPage.value,
            secondPage.value
        );

        if (firstPage.value != 1) {
            selectPage(pages.value[firstPage.value]);
        } else {
            selectPage(pages.value[secondPage.value]);
        }
    }

    function init() {
        const book = BookSchema.parse(usePage().props.value.book);
        // TODO: Get the type of the book, so we can detirman whatever we should set "spine" or not

        const bookLength = book.pages + 4;

        const generatedPages = Array.from({ length: bookLength }, (_, i) => ({
            page: i - 1,
            background: "#FFFFFF",
            templates: null,
        }));

        pages.value = generatedPages;

        // Set visiblePages
        setVisiblePages();

        // Set the spine
        spine.value = {
            text: "",
            color: "#000000",
            font: "",
        };
    }

    init();

    function selectPage(page) {
        selectedPage.value = page;
    }

    function updatePage(payload) {
        if (selectedPage.value) {
            selectedPage.value.content = payload;
        }
    }

    function updatePageBackground(color: string) {
        selectedPage.value.background = color;
    }

    function appendToPage(payload) {
        if (selectedPage.value) {
            if (Array.isArray(selectedPage.value.content)) {
                selectedPage.value.content.push(payload);
            } else {
                selectedPage.value.content = [payload];
            }
        }
    }

    function removePage(page) {}

    function turnThePage() {
        const numberOfPages = pages.value.length;

        firstPage.value = secondPage.value;

        if (secondPage.value + 2 < numberOfPages) {
            secondPage.value += 2;
        } else {
            secondPage.value += 1;
        }

        setVisiblePages();
    }

    function turnBackThePage() {
        secondPage.value = firstPage.value;

        if (firstPage.value - 2 > 0) {
            firstPage.value -= 2;
        } else {
            firstPage.value -= 1;
        }

        setVisiblePages();
    }

    return {
        pages,
        spine,
        visiblePages,
        selectedPage,
        isSpineVisible,
        firstPage,
        secondPage,

        init,
        selectPage,
        updatePage,
        updatePageBackground,
        appendToPage,
        removePage,
        turnThePage,
        turnBackThePage,
    };
});
