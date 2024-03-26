<template>
    <div v-if="currentUser.id" class="min-h-full bg-gray-200 flex">
        <!-- Sidebar -->
        <Sidebar :class="{ '-ml-[260px]': !sidebarOpened }"></Sidebar>
        <!-- Sidebar end -->

        <!-- Header -->
        <div class="flex-1">
            <Navbar @toggle-sidebar="toggleSidebar"></Navbar>
            <!-- Header end -->

            <!-- Content -->
            <main class="p-6">
                <div class="p-4 rounded bg-white">
                    <router-view></router-view>
                </div>
            </main>
            <!-- Content end -->
        </div>
    </div>
    <div v-else>
        <div class="flex flex-col items-center">
            <div class="flex items-center justify-center h-screen">
                <div
                    class="inline-block h-10 w-10 animate-spin rounded-full border-4 border-solid border-current border-e-transparent align-[-0.125em] text-black dark:text-gray-400 mr-2"
                    role="status"
                >
                    <span
                        class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
                        >Loading...</span
                    >
                </div>
                <div class="ml-2">
                    Please Wait...
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted, computed } from "vue";
import Navbar from "./Navbar.vue";
import Sidebar from "./Sidebar.vue";
import store from "../store";

const props = defineProps({
    title: {
        type: String,
    },
});

const sidebarOpened = ref(true);
const currentUser = computed(() => store.state.user.data);

function toggleSidebar() {
    sidebarOpened.value = !sidebarOpened.value;
}

onMounted(() => {
    store.dispatch("getUser");
    handleSidebarOpened();
    window.addEventListener("resize", handleSidebarOpened);
});

onUnmounted(() => {
    window.removeEventListener("resize", handleSidebarOpened);
});

function handleSidebarOpened() {
    sidebarOpened.value = window.outerWidth >= 768;
}
</script>

<style scoped></style>
