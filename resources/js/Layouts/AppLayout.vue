<template>
    <Head title="Dashboard" />
    <Navbar />
    <slot />
    <Footer />
</template>

<script>
import { Link, Head } from "@inertiajs/vue3";
import Navbar from "@/Components/Navbar.vue";
import Footer from "@/Components/Footer.vue";

export default {
    components: {
        Link,
        Head,
        Navbar,
        Footer,
    },
    mounted() {
        // Menambahkan kelas 'bg-body-tertiary' pada elemen <body>
        document.body.classList.add("bg-body-tertiary");
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
