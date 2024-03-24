<template>
    <div class="min-h-full flex">
        <!-- Sidebar -->
        <Sidebar></Sidebar>
        <!-- Sidebar end -->

        <!-- Header -->
        <div class="flex-1">
            <header class="h-8 shadow bg-white">
                Header 
            </header>
        <!-- Header end -->

        <!-- Content -->
            <main>
                <router-view></router-view>
            </main>
         <!-- Content end -->
        </div>

    </div>
</template>

<script setup>
import Sidebar from './Sidebar.vue'
const props = defineProps({
    title: {
        type: String,
    },
});
</script>

<style scoped></style>
