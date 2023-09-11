<template>
    <Head title="Beranda" />
    <DashboardLayoutVue>
        <PageTitle title="Beranda" />
        <!-- <Breadcrumb :items="breadcrumbs" :currentPage="pageTitle" /> -->
        <p>Hello World</p>
    </DashboardLayoutVue>
</template>

<script>
import { Head } from "@inertiajs/vue3";
import DashboardLayoutVue from "../Layouts/DashboardLayout.vue";
import PageTitle from "@/Components/Admin/PageTitle.vue";
import Breadcrumb from "@/Components/Admin/Breadcrumb.vue";

export default {
    components: {
        Head,
        DashboardLayoutVue,
        PageTitle,
        Breadcrumb,
    },
    data() {
        return {
            pageTitle: "Beranda",
            breadcrumbs: [
                {
                    label: "Admin",
                    url: route("dashboard"),
                },
            ],
        };
    },
};
</script>

<style>
/* add body class to bg-body-tertiary */
</style>
