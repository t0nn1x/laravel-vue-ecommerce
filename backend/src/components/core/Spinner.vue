<template>
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
            <div class="ml-2">Please Wait...</div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Spinner"
}
</script>

<style scoped></style>
