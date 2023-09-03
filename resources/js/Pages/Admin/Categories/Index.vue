<template>
    <DashboardLayout>
        <DashboardSidebar />
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <DashboardTitle title="Categories" />
            <p>Categories</p>
        </main>
    </DashboardLayout>
</template>

<script>
import { Link, Head } from "@inertiajs/vue3";
import DashboardLayout from "../../../Layouts/DashboardLayout.vue";
import DashboardSidebar from "../../../Components/DashboardSidebar.vue";
import DashboardTitle from "../../../Components/DashboardTitle.vue";

export default {
    components: {
        Link,
        Head,
        DashboardLayout,
        DashboardTitle,
        DashboardSidebar,
    },
};
</script>
