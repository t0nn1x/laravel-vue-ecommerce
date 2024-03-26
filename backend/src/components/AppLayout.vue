<template>
    <div class="min-h-full bg-gray-200 flex">
        <!-- Sidebar -->
        <Sidebar :class="{'-ml-[260px]' : !sidebarOpened}"></Sidebar>
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
</template>

<script setup>
import {ref, onMounted, onUnmounted} from 'vue';
import Navbar from "./Navbar.vue";
import Sidebar from "./Sidebar.vue";
import store from '../store';
const props = defineProps({
    title: {
        type: String,
    },
});

const sidebarOpened = ref(true);

function toggleSidebar() {
    sidebarOpened.value = !sidebarOpened.value
}

onMounted(() => {
    store.dispatch('getUser');
    handleSidebarOpened();
    window.addEventListener('resize', handleSidebarOpened);
})

onUnmounted(() => {
    window.removeEventListener('resize', handleSidebarOpened);
})

function handleSidebarOpened() {
    sidebarOpened.value = window.outerWidth >= 768;
}
</script>

<style scoped></style>
