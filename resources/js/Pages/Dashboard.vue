<template>
    <Head title="Dashboard" />
    <DashboardLayout>
        <div class="row">
            <div class="col">
                <p>Helow</p>
            </div>
        </div>
    </DashboardLayout>
</template>

<script>
import DashboardLayout from "../Layouts/DashboardLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

export default {
    layout: DashboardLayout,
    components: {
        Head,
        Link,
    },
};
</script>
