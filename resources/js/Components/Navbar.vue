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
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <Link
                            class="nav-link active"
                            aria-current="page"
                            href="#"
                            >Home</Link
                        >
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" href="#">About</Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" href="#">Services</Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" href="#">Contact</Link>
                    </li>
                </ul>
                <div class="d-flex">
                    <!-- Link Sign Up -->
                    <a href="/signup" class="px-4 py-2 btn btn-primary">
                        Daftar
                    </a>

                    <!-- Link Sign In -->
                    <a
                        href="/signin"
                        class="px-4 py-2 btn btn-outline-secondary ms-2"
                    >
                        Masuk
                    </a>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
import { Head, Link } from "@inertiajs/vue3";

export default {
    components: {
        Head,
        Link,
    },
};
</script>
