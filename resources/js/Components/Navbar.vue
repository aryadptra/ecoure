<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary p-3">
        <div class="container-fluid">
            <Link class="navbar-brand" href="/">Arya Dwi Putra</Link>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <Link
                            class="nav-link active"
                            aria-current="page"
                            href="#"
                            >Beranda</Link
                        >
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" href="#">Kursus</Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" href="#">Tentang</Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" href="#">Kontak </Link>
                    </li>
                </ul>
                <div class="d-flex">
                    <!-- Check if user is logged in -->
                    <template v-if="isLoggedIn">
                        <!-- Dropdown menu with user name -->
                        <div class="dropdown">
                            <a
                                class="dropdown-toggle"
                                href="#"
                                role="button"
                                id="userDropdown"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                                style="text-decoration: none; color: inherit"
                            >
                                <img
                                    class="avatar rounded-circle mx-2"
                                    alt="Image placeholder"
                                    :src="`https://ui-avatars.com/api/?name=${$page.props.auth.user.name}&amp;background=4e73df&amp;color=ffffff&amp;size=30`"
                                />
                                {{ $page.props.auth.user.name }}
                            </a>
                            <ul
                                class="dropdown-menu"
                                aria-labelledby="userDropdown"
                            >
                                <!-- Dropdown menu items -->
                                <li>
                                    <Link
                                        class="dropdown-item"
                                        :href="route('dashboard')"
                                        >Dashboard</Link
                                    >
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#"
                                        >Pengaturan</a
                                    >
                                </li>
                                <li><hr class="dropdown-divider" /></li>
                                <li>
                                    <a class="dropdown-item" href="#"
                                        >Log Out</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </template>
                    <!-- If user is not logged in, show sign up and sign in buttons -->
                    <template v-else>
                        <div>
                            <!-- Link Sign Up -->
                            <Link
                                :href="route('register')"
                                class="px-4 py-2 btn btn-primary"
                            >
                                Daftar
                            </Link>

                            <!-- Link Sign In -->
                            <Link
                                :href="route('login')"
                                class="px-4 py-2 btn btn-outline-secondary ms-2"
                            >
                                Masuk
                            </Link>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
import { Head, Link, usePage } from "@inertiajs/vue3";
import { computed } from "vue"; // Import computed from Vue

export default {
    components: {
        Head,
        Link,
    },

    setup() {
        const page = usePage();

        const isLoggedIn = computed(() => {
            return page.props.auth.user !== null;
        });

        return {
            isLoggedIn,
        };
    },
};
</script>
