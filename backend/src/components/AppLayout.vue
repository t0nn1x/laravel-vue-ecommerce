<template>
    <div class="min-h-full bg-gray-200 flex">
        <!-- Sidebar -->
        <Sidebar></Sidebar>
        <!-- Sidebar end -->

        <!-- Header -->
        <div class="flex-1">
            <Navbar></Navbar>
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
import Navbar from './Navbar.vue'
import Sidebar from './Sidebar.vue'
const props = defineProps({
    title: {
        type: String,
    },
});
</script>

<style scoped></style>
