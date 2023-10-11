<template>
    <Head title="Dashboard" />
    <div class="container-fluid">
        <Navbar />
        <div class="row mt-3">
            <div class="col-md-2">
                <VerticalNav />
            </div>
            <div class="col-md-10">
                <slot />
            </div>
        </div>
    </div>
</template>

<script>
import { Head } from "@inertiajs/vue3";
import Navbar from "../Components/Admin/Navbar.vue";
import VerticalNav from "../Components/Admin/VerticalNav.vue";

export default {
    components: {
        Head,
        Navbar,
        VerticalNav,
    },
    mounted() {
        // Menambahkan kelas 'bg-body-tertiary' pada elemen <body>
        document.body.classList.add("bg-body-tertiary");
    },
};
</script>
