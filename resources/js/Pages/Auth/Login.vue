<template>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div
                class="row d-flex justify-content-center align-items-center h-100"
            >
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img
                        src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid"
                        alt="Sample image"
                    />
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form @submit.prevent="submit">
                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0">
                                Masuk ke Dashboard
                            </p>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3"
                                >Email</label
                            >
                            <!-- v if errors -->
                            <div v-if="errors.email" class="text-danger">
                                {{ errors.email[0] }}
                            </div>
                            <input
                                type="email"
                                id="form3Example3"
                                class="form-control form-control-lg"
                                placeholder="Masukkan alamat email"
                                v-model="form.email"
                            />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="form3Example4"
                                >Password</label
                            >

                            <!-- v if errors -->
                            <div v-if="errors.password" class="text-danger">
                                {{ errors.password[0] }}
                            </div>

                            <input
                                type="password"
                                id="form3Example4"
                                class="form-control form-control-lg"
                                placeholder="Masukkan kata sandi"
                                v-model="form.password"
                            />
                        </div>

                        <div
                            class="d-flex justify-content-between align-items-center"
                        >
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input
                                    class="form-check-input me-2"
                                    type="checkbox"
                                    value=""
                                    id="form2Example3"
                                />
                                <label
                                    class="form-check-label"
                                    for="form2Example3"
                                >
                                    Remember me
                                </label>
                            </div>
                            <a href="#!" class="text-body">Forgot password?</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button
                                type="submit"
                                class="btn btn-primary btn-lg"
                                style="
                                    padding-left: 2.5rem;
                                    padding-right: 2.5rem;
                                "
                            >
                                Login
                            </button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">
                                Don't have an account?
                                <a href="#!" class="link-danger">Register</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { Head, Link, router } from "@inertiajs/vue3";
import { reactive } from "vue";

export default {
    components: {
        Head,
        Link,
    },

    //props
    props: {
        errors: Object,
        session: Object,
    },

    setup() {
        const form = reactive({
            email: "",
            password: "",
        });

        const submit = () => {
            router.post(route("login"), {
                email: form.email,
                password: form.password,
            });
        };

        return {
            form,
            submit,
        };
    },
};
</script>

<style scoped>
.divider:after,
.divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
}
.h-custom {
    height: calc(100% - 73px);
}
@media (max-width: 450px) {
    .h-custom {
        height: 100%;
    }
}
</style>
