<template>
    <Head title="Dashboard" />
    <Navbar />
    <slot />
</template>

<script>
import { Link, Head } from "@inertiajs/vue3";
import Navbar from "@/Components/Navbar.vue";

export default {
    components: {
        Link,
        Head,
        Navbar,
    },
};
</script>

<style>
.navbar-brand {
    font-size: 22px;
    font-weight: 700;
}
.navbar-nav .nav-item {
    font-weight: 500;
    font-size: 16 px;
    /* Media Query on MD */
    @media (min-width: 992px) {
        margin: 0 10px;
    }
}
</style>
