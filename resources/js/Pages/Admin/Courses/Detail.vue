<template>
    <DashboardLayout>
        <PageTitle title="Courses" />
        <Breadcrumb :items="bradcrumbs" :currentPage="currentPage" />

        <div class="row">
            <div class="col-4 col-md-4">
                <div class="d-flex justify-content-start">
                    <Link
                        class="btn btn-primary"
                        :href="route('articles.create')"
                    >
                        Add Article
                    </Link>
                </div>
            </div>
        </div>
    </DashboardLayout>
</template>

<script>
import { Link, Head, router } from "@inertiajs/vue3";
import { reactive, ref } from "vue";
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import PageTitle from "@/Components/Admin/PageTitle.vue";
import Breadcrumb from "@/Components/Admin/Breadcrumb.vue";
import Pagination from "@/Components/Admin/Pagination.vue";
import Swal from "sweetalert2";
import Editor from "@tinymce/tinymce-vue";

export default {
    components: {
        Link,
        Head,
        DashboardLayout,
        PageTitle,
        Breadcrumb,
        Pagination,
        Editor,
    },
    props: {
        articles: Object,
        errors: Object,
    },
    data() {
        return {
            bradcrumbs: [
                {
                    label: "Admin",
                    url: route("dashboard"),
                },
                {
                    label: "Course",
                    url: route("courses.index"),
                },
            ],
            currentPage: "Detail",
        };
    },
};
</script>
