<template>
    <div
        class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary"
    >
        <div
            class="offcanvas-md offcanvas-end bg-body-tertiary"
            tabindex="-1"
            id="sidebarMenu"
            aria-labelledby="sidebarMenuLabel"
        >
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="sidebarMenuLabel">
                    Arya Dwi Putra
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="offcanvas"
                    data-bs-target="#sidebarMenu"
                    aria-label="Close"
                ></button>
            </div>
            <div
                class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto"
            >
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <Link
                            class="nav-link d-flex align-items-center gap-2"
                            :class="{
                                active: $page.url.startsWith('/dashboard'),
                            }"
                            aria-current="page"
                            :href="route('dashboard')"
                        >
                            <svg class="bi">
                                <use xlink:href="#house-fill" />
                            </svg>
                            Dashboard
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link
                            class="nav-link d-flex align-items-center gap-2"
                            :href="route('categories.index')"
                            :class="{
                                active: $page.url.startsWith('/categories'),
                            }"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-tag"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0z"
                                />
                                <path
                                    d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1zm0 5.586 7 7L13.586 9l-7-7H2v4.586z"
                                />
                            </svg>
                            Categories
                        </Link>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link d-flex align-items-center gap-2"
                            href="#"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-book"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"
                                />
                            </svg>
                            E-Books
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link d-flex align-items-center gap-2"
                            href="#"
                        >
                            <svg class="bi">
                                <use xlink:href="#cart" />
                            </svg>
                            Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link d-flex align-items-center gap-2"
                            href="#"
                        >
                            <svg class="bi">
                                <use xlink:href="#people" />
                            </svg>
                            Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link d-flex align-items-center gap-2"
                            href="#"
                        >
                            <svg class="bi">
                                <use xlink:href="#graph-up" />
                            </svg>
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link d-flex align-items-center gap-2"
                            href="#"
                        >
                            <svg class="bi">
                                <use xlink:href="#puzzle" />
                            </svg>
                            Integrations
                        </a>
                    </li>
                </ul>

                <!-- <h6
                            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase"
                        >
                            <span>Saved reports</span>
                            <a
                                class="link-secondary"
                                href="#"
                                aria-label="Add a new report"
                            >
                                <svg class="bi">
                                    <use xlink:href="#plus-circle" />
                                </svg>
                            </a>
                        </h6>
                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <a
                                    class="nav-link d-flex align-items-center gap-2"
                                    href="#"
                                >
                                    <svg class="bi">
                                        <use xlink:href="#file-earmark-text" />
                                    </svg>
                                    Current month
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link d-flex align-items-center gap-2"
                                    href="#"
                                >
                                    <svg class="bi">
                                        <use xlink:href="#file-earmark-text" />
                                    </svg>
                                    Last quarter
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link d-flex align-items-center gap-2"
                                    href="#"
                                >
                                    <svg class="bi">
                                        <use xlink:href="#file-earmark-text" />
                                    </svg>
                                    Social engagement
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link d-flex align-items-center gap-2"
                                    href="#"
                                >
                                    <svg class="bi">
                                        <use xlink:href="#file-earmark-text" />
                                    </svg>
                                    Year-end sale
                                </a>
                            </li>
                        </ul> -->

                <hr class="my-3" />

                <ul class="nav flex-column mb-auto">
                    <li class="nav-item">
                        <a
                            class="nav-link d-flex align-items-center gap-2"
                            href="#"
                        >
                            <svg class="bi">
                                <use xlink:href="#gear-wide-connected" />
                            </svg>
                            Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <Link
                            class="nav-link d-flex align-items-center gap-2"
                            href="#"
                        >
                            <svg class="bi">
                                <use xlink:href="#door-closed" />
                            </svg>
                            Sign out
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },
};
</script>

<style scoped>
.bi {
    display: inline-block;
    width: 1rem;
    height: 1rem;
}

/*
 * Sidebar
 */

@media (min-width: 768px) {
    .sidebar .offcanvas-lg {
        position: -webkit-sticky;
        position: sticky;
        top: 48px;
    }
    .navbar-search {
        display: block;
    }
}

.sidebar .nav-link {
    font-size: 0.875rem;
    font-weight: 500;
}

.sidebar .nav-link.active {
    color: #434e5f;
    font-weight: 600;
}

.sidebar-heading {
    font-size: 0.75rem;
}

/*
 * Navbar
 */

.navbar-brand {
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
    background-color: rgba(0, 0, 0, 0.25);
    box-shadow: inset -1px 0 0 rgba(0, 0, 0, 0.25);
}

.navbar .form-control {
    padding: 0.75rem 1rem;
}

.bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
}

@media (min-width: 768px) {
    .bd-placeholder-img-lg {
        font-size: 3.5rem;
    }
}

.b-example-divider {
    width: 100%;
    height: 3rem;
    background-color: rgba(0, 0, 0, 0.1);
    border: solid rgba(0, 0, 0, 0.15);
    border-width: 1px 0;
    box-shadow: inset 0 0.5em 1.5em rgba(0, 0, 0, 0.1),
        inset 0 0.125em 0.5em rgba(0, 0, 0, 0.15);
}

.b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
}

.bi {
    vertical-align: -0.125em;
    fill: currentColor;
}

.nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
}

.nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
}

.btn-bd-primary {
    --bd-violet-bg: #712cf9;
    --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

    --bs-btn-font-weight: 600;
    --bs-btn-color: var(--bs-white);
    --bs-btn-bg: var(--bd-violet-bg);
    --bs-btn-border-color: var(--bd-violet-bg);
    --bs-btn-hover-color: var(--bs-white);
    --bs-btn-hover-bg: #6528e0;
    --bs-btn-hover-border-color: #6528e0;
    --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
    --bs-btn-active-color: var(--bs-btn-hover-color);
    --bs-btn-active-bg: #5a23c8;
    --bs-btn-active-border-color: #5a23c8;
}
.bd-mode-toggle {
    z-index: 1500;
}
</style>
