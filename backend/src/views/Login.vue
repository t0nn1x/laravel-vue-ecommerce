<template>
    <GuestLayout title="Sign in to your account">
        <form class="space-y-6" method="POST" @submit.prevent="login">
            <div
                v-if="errorMsg"
                class="flex items-center justify-between py-3 px-5 bg-red-500 text-white rounded"
            >
                {{ errorMsg }}
                <span
                @click="errorMsg = ''"
                class="w-8 h-8 flex items-center justify-center rounded-full transition-colors cursor-pointer hover:bg-black/20"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18 18 6M6 6l12 12"
                    />
                </svg>
            </span>
            </div>
            
            <div>
                <label
                    for="email"
                    class="block text-sm font-medium leading-6 text-gray-900 text-left"
                    >Email address</label
                >
                <div class="mt-2">
                    <input
                        id="email"
                        name="email"
                        type="email"
                        autocomplete="email"
                        required=""
                        v-model="user.email"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    />
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label
                        for="password"
                        class="block text-sm font-medium leading-6 text-gray-900"
                        >Password</label
                    >
                    <div class="text-sm">
                        <router-link
                            to="/request-password"
                            class="font-semibold text-indigo-600 hover:text-indigo-500"
                            >Forgot password?</router-link
                        >
                    </div>
                </div>
                <div class="mt-2">
                    <input
                        id="password"
                        name="password"
                        type="password"
                        autocomplete="current-password"
                        required=""
                        v-model="user.password"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    />
                </div>
            </div>

            <div class="mt-4 flex items-center">
                <input
                    id="remember_me"
                    name="remember_me"
                    type="checkbox"
                    v-model="user.remember"
                    class="form-checkbox h-4 w-4 rounded text-indigo-600 transition duration-150 ease-in-out"
                />
                <label
                    for="remember_me"
                    class="ml-2 block text-sm leading-5 text-gray-900"
                >
                    Remember me
                </label>
            </div>

            <div>
                <button
                    type="submit"
                    :disabled="loading"
                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    :class="{
                        'cursor-not-allowed': loading,
                        'hover:bg-indigo-500': loading,
                    }"
                >
                    <div
                        v-if="loading"
                        class="inline-block h-6 w-6 animate-spin rounded-full border-4 border-solid border-current border-e-transparent align-[-0.125em] text-surface motion-reduce:animate-[spin_1.5s_linear_infinite] dark:text-white mr-2"
                        role="status"
                    >
                        <span
                            class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
                            >Loading...</span
                        >
                    </div>
                    Sign in
                </button>
            </div>
        </form>
    </GuestLayout>
</template>

<script setup>
import { ref } from "vue";
import GuestLayout from "../components/GuestLayout.vue";
import { useRouter } from "vue-router";
import store from "../store";

const router = useRouter();

let loading = ref(false);
let errorMsg = ref("");

const user = {
    email: "",
    password: "",
    remember: false,
};

function login() {
    loading.value = true;
    store
        .dispatch("login", user)
        .then(() => {
            loading.value = false;
            router.push({ name: "app.dashboard" });
        })
        .catch(({ response }) => {
            loading.value = false;
            errorMsg.value = response.data.message;
        });
}
</script>

<style scoped></style>
