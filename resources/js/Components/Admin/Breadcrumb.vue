<template>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li
                class="breadcrumb-item"
                v-for="(item, index) in items"
                :key="index"
            >
                <Link :href="item.url">{{ item.label }}</Link>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ currentPage }}
            </li>
        </ol>
    </nav>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },

    props: {
        items: {
            type: Array,
            required: true,
        },
        currentPage: {
            type: String,
            required: true,
        },
    },
};
</script>

<style>
.breadcrumb-item a {
    text-decoration: none !important;
    color: inherit;
}
</style>
