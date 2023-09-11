<template>
    <DashboardLayout>
        <PageTitle title="Categories" />
        <Breadcrumb :items="bradcrumbs" :currentPage="currentPage" />

        <!-- Button add data and search data -->
        <!-- <div class="d-flex justify-content-between mb-3">
                <div class="input-group">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Search"
                        aria-label="Search"
                        aria-describedby="button-addon2"
                    />
                    <button
                        class="btn btn-outline-secondary"
                        type="button"
                        id="button-addon2"
                    >
                        Search
                    </button>
                </div>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button
                        type="button"
                        class="btn btn-sm btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#exampleModal"
                    >
                        Add Category
                    </button>
                </div>
            </div> -->

        <div class="row">
            <div class="col-8 col-md-8">
                <form @submit.prevent="handleSearch">
                    <div class="input-group mb-3">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Categories name"
                            aria-label="Categories name"
                            aria-describedby="basic-addon2"
                            v-model="search"
                        />
                        <button
                            class="btn btn-outline-secondary"
                            type="submit"
                            id="basic-addon2"
                        >
                            Search
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-4 col-md-4">
                <div class="d-flex justify-content-end">
                    <button
                        type="button"
                        class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#exampleModal"
                    >
                        Add Category
                    </button>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr
                                v-for="(category, index) in categories.data"
                                :key="index"
                            >
                                <th scope="row">
                                    {{
                                        ++index +
                                        (categories.current_page - 1) *
                                            categories.per_page
                                    }}
                                </th>
                                <td>
                                    <!-- Img -->
                                    <img
                                        :src="`/images/categories/${category.logo}`"
                                        class="rounded"
                                        width="50"
                                        height="50"
                                    />
                                </td>
                                <td>{{ category.name }}</td>
                                <td>{{ category.description }}</td>
                                <td>
                                    <div
                                        class="btn-group"
                                        role="group"
                                        aria-label="Basic example"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#exampleModalEdit"
                                            @click="editCategory(category)"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                fill="currentColor"
                                                class="bi bi-pencil"
                                                viewBox="0 0 16 16"
                                            >
                                                <path
                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"
                                                />
                                            </svg>
                                        </button>
                                        <button
                                            type="button"
                                            class="btn btn-danger"
                                            @click="deleteCategory(category.id)"
                                        >
                                            <!-- icon trash -->
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                fill="currentColor"
                                                class="bi bi-trash"
                                                viewBox="0 0 16 16"
                                            >
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"
                                                />
                                                <path
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"
                                                />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <Pagination :links="categories.links" align="end" />
            </div>
        </div>

        <!-- Modal Add -->
        <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <form @submit.prevent="submit">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Add Category
                            </h5>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label"
                                    >Name</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    aria-describedby="emailHelp"
                                    v-model="form.name"
                                />
                            </div>
                            <!-- Errors -->
                            <div v-if="errors.name" class="alert alert-danger">
                                {{ errors.name }}
                            </div>
                            <!-- Logo -->
                            <div class="mb-3">
                                <label for="logo">Logo</label>
                                <!-- Input File With Inertia -->
                                <input
                                    type="file"
                                    class="form-control"
                                    id="logo"
                                    ref="logo"
                                    @input="form.logo = $event.target.files[0]"
                                />
                            </div>
                            <!-- Errors -->
                            <div v-if="errors.logo" class="alert alert-danger">
                                {{ errors.logo }}
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label"
                                    >Description</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="description"
                                    aria-describedby="emailHelp"
                                    v-model="form.description"
                                />
                            </div>
                            <!-- Errors -->
                            <div
                                v-if="errors.description"
                                class="alert alert-danger"
                            >
                                {{ errors.description }}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                                id="btn-close-modal"
                            >
                                Close
                            </button>
                            <button
                                type="submit"
                                id="btn-save"
                                class="btn btn-primary"
                            >
                                Add
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Edit -->
        <div
            class="modal fade"
            id="exampleModalEdit"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <form @submit.prevent="submitEdit">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Edit Category
                            </h5>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label"
                                    >Name</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    aria-describedby="emailHelp"
                                    v-model="formEdit.name"
                                />
                            </div>
                            <!-- Errors -->
                            <div v-if="errors.name" class="alert alert-danger">
                                {{ errors.name }}
                            </div>
                            <!-- Logo -->
                            <div class="mb-3">
                                <label for="logo">Logo</label>
                                <!-- Input File With Inertia -->
                                <input
                                    type="file"
                                    class="form-control"
                                    id="logo"
                                    ref="logo"
                                    @input="
                                        formEdit.logo = $event.target.files[0]
                                    "
                                />
                                <small class="text-danger"
                                    >*Blank if cannot be update</small
                                >
                            </div>
                            <!-- Errors -->
                            <div v-if="errors.logo" class="alert alert-danger">
                                {{ errors.logo }}
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label"
                                    >Description</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="description"
                                    aria-describedby="emailHelp"
                                    v-model="formEdit.description"
                                />
                            </div>
                            <!-- Errors -->
                            <div
                                v-if="errors.description"
                                class="alert alert-danger"
                            >
                                {{ errors.description }}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                                id="btn-close-modal-edit"
                            >
                                Close
                            </button>
                            <button
                                type="submit"
                                id="btn-update"
                                class="btn btn-primary"
                            >
                                Update
                            </button>
                        </div>
                    </div>
                </form>
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

export default {
    components: {
        Link,
        Head,
        DashboardLayout,
        PageTitle,
        Breadcrumb,
        Pagination,
    },
    props: {
        categories: Object,
        errors: Object,
    },
    data() {
        return {
            bradcrumbs: [
                {
                    label: "Admin",
                    url: route("dashboard"),
                },
            ],
            currentPage: "Categories",
        };
    },
    setup() {
        //define state search
        const search = ref(
            "" || new URL(document.location).searchParams.get("q")
        );

        //define method search
        const handleSearch = () => {
            router.get(route("categories.index"), {
                //send params "q" with value from state "search"
                q: search.value,
            });
        };

        const form = reactive({
            name: "",
            description: "",
            logo: "",
        });

        const formEdit = reactive({
            id: "",
            name: "",
            description: "",
            logo: "",
        });

        const submit = () => {
            // Disable button #btn-save and change text to saving...
            document.getElementById("btn-save").disabled = true;
            document.getElementById("btn-save").innerHTML = "Saving...";

            router.post(
                route("categories.store"),
                {
                    name: form.name,
                    description: form.description,
                    logo: form.logo,
                },
                {
                    // forceFormData: true,
                    onSuccess: () => {
                        // reset form
                        form.name = "";
                        form.description = "";
                        form.logo = "";
                        document.getElementById("logo").value = "";

                        // enable #btn-save
                        document.getElementById("btn-save").disabled = false;
                        document.getElementById("btn-save").innerHTML = "Save";

                        // click button close modal
                        document.getElementById("btn-close-modal").click();

                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: "Category Added Successfully!",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    },
                }
            );
        };

        // delete category
        const deleteCategory = (id) => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
                timer: 1500,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    );
                    router.delete(route("categories.destroy", id));
                }
            });
        };

        // editCategory
        const editCategory = (category) => {
            formEdit.id = category.id;
            formEdit.name = category.name;
            formEdit.description = category.description;
            formEdit.logo = category.logo;
        };

        // submitEdit
        const submitEdit = () => {
            console.log(formEdit);
            // Disable button #btn-update and change text to updating...
            document.getElementById("btn-update").disabled = true;
            document.getElementById("btn-update").innerHTML = "Updating...";

            router.put(
                route("categories.update", formEdit.id),
                {
                    name: formEdit.name,
                    description: formEdit.description,
                    logo: formEdit.logo,
                },
                {
                    // forceFormData: true,
                    onSuccess: () => {
                        // reset form
                        formEdit.name = "";
                        formEdit.description = "";
                        formEdit.logo = "";
                        document.getElementById("logo").value = "";

                        // enable #btn-update
                        document.getElementById("btn-update").disabled = false;
                        document.getElementById("btn-update").innerHTML =
                            "Update";

                        // click button close modal
                        document.getElementById("btn-close-modal-edit").click();

                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: "Category Updated Successfully!",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    },
                    onError: () => {
                        // enable #btn-update
                        document.getElementById("btn-update").disabled = false;
                        document.getElementById("btn-update").innerHTML =
                            "Update";
                    },
                }
            );
        };

        return {
            form,
            submit,
            handleSearch,
            search,
            formEdit,
            editCategory,
            submitEdit,
            deleteCategory,
        };
    },
};
</script>
