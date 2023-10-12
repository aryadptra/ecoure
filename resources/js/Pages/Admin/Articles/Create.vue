<template>
    <DashboardLayout>
        <PageTitle title="Create Article" />
        <Breadcrumb :items="bradcrumbs" :currentPage="currentPage" />

        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">Add Article</div>
                    <div class="card-body">
                        <form @submit.prevent="submit">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <!-- Select Courses -->
                                        <label
                                            class="form-label"
                                            for="course_id"
                                            >Course</label
                                        >
                                        <select
                                            class="form-control"
                                            name="course_id"
                                            id="course_id"
                                            v-model="form.course_id"
                                        >
                                            <option
                                                v-for="course in courses"
                                                :key="course.id"
                                                :value="course.id"
                                            >
                                                {{ course.name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for=""
                                            >Name</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            placeholder=""
                                            v-model="form.name"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for=""
                                            >Episode</label
                                        >
                                        <input
                                            type="number"
                                            class="form-control"
                                            name="episode"
                                            id="episode"
                                            v-model="form.episode"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for=""
                                            >Status</label
                                        >
                                        <select
                                            name="status"
                                            class="form-control"
                                            id="status"
                                            v-model="form.status"
                                        >
                                            <option value="on">On</option>
                                            <option value="off">Off</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label
                                            for="description"
                                            class="form-label"
                                            >Content</label
                                        >
                                        <Editor
                                            api-key="zqavphvts8k9aaq6jfmx4sez043hq2uezgnuhi3pl9t2iar6"
                                            v-model="form.content"
                                            :init="{
                                                height: 500,
                                                plugins: [
                                                    'advlist autolink lists link image charmap print preview anchor',
                                                    'searchreplace visualblocks code fullscreen',
                                                    'insertdatetime media table paste code help wordcount',
                                                ],
                                                toolbar:
                                                    'undo redo | formatselect | bold italic backcolor | \
                                          alignleft aligncenter alignright alignjustify | \
                                          bullist numlist outdent indent | removeformat | help',
                                            }"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-end">
                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                            id="btn-save"
                                        >
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
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
        courses: Object,
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
                {
                    label: "Article",
                    url: route("articles.index"),
                },
            ],

            currentPage: "Create",
        };
    },

    setup() {
        const form = reactive({
            course_id: "",
            name: "",
            episode: "",
            content: "",
            status: "",
        });

        const submit = () => {
            // Disable button #btn-save and change text to saving...
            document.getElementById("btn-save").disabled = true;
            document.getElementById("btn-save").innerHTML = "Menyimpan...";

            router.post(
                route("articles.store"),
                {
                    course_id: form.course_id,
                    name: form.name,
                    episode: form.episode,
                    content: form.content,
                    status: form.status,
                },
                {
                    // forceFormData: true,
                    onSuccess: () => {
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: "Article Added Successfully!",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    },
                    onError: () => {
                        // enable #btn-save
                        document.getElementById("btn-save").disabled = false;
                        document.getElementById("btn-save").innerHTML =
                            "Simpan";
                    },
                }
            );
        };

        return {
            form,
            submit,
        };
    },
};
</script>
