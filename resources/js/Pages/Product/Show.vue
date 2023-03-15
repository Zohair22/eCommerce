<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

let props = defineProps({
    product: Object,
});

</script>

<template>
    <Head :title="product.name" />
    <authenticated-layout>
        <template #header >
            <div class="lg:grid md:grid grid-cols-3 items-center">
                <h2 class="font-semibold transition-all transform duration-700 text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ product.name }}
                </h2>
            </div>
        </template>


        <div class="grid gap-4 grid-cols-2 justify-between dark:bg-gray-600 dark:text-white max-w-6xl mx-auto bg-gray-300 max-h-fit rounded-3xl shadow-2xl mt-16">
            <div class="flex">
                <img :src="product.image"
                     class="bg-center relative z-0 right-20 hover:right-24 rounded-l-full rounded-r-lg w-full h-96 my-auto grayscale hover:grayscale-0 shadow hover:shadow-2xl  shadow-gray-900 cursor-pointer filter backdrop-filter object-fill object-center transition-all transform duration-700"/>
            </div>
            <div class="col-span-1 px-2 py-10 sm:px-6">
                <h3 class="mx-auto mb-6 font-semibold text-center dark:text-white">
                    <div
                        v-text="product.name"
                        class="mx-auto bg-gray-500 hover:bg-gray-70 w-fit text-3xl text-white px-16 py-1 rounded-2xl dark:text-white text-gray-900 dark:bg-gray-700 dark:hover:bg-gray-800 transition-all transform duration-700"
                    />
                </h3>
                <h3 class="text-sm m-2 leading-6 font-medium text-gray-900 dark:text-gray-300">
                    {{ product.description }}
                </h3>
                <h3 class="text-sm m-2 leading-6 font-medium text-gray-900 dark:text-gray-300">
<!--                    {{ product.category().name }}-->
                </h3>
                <hr class="my-8">
                <div class="flex justify-between items-center">
                    <h3 class="text-md mb-1 leading-6 font-medium text-white">
                        <span
                            class="bg-red-700 hover:bg-red-800 transition-all transform duration-700 rounded-3xl px-4 py-0.5">
                            In stock : {{ product.stock }}
                        </span>
                    </h3>
                    <h3
                        class="text-md mb-1 leading-6 font-medium text-white"
                        v-if="product.discount > 0"
                    >
                        <span
                            class="bg-yellow-600 hover:bg-yellow-700 transition-all transform duration-700 rounded-3xl px-4 py-0.5">
                            Discount : {{ product.discount }} %
                        </span>
                    </h3>
                </div>
                <div class="flex justify-between items-center text-md mb-1 leading-6 font-medium text-white">
                    <h1 class="bg-indigo-700 mb-1 w-fit hover:bg-indigo-800 transition-all transform duration-700 rounded-3xl px-4 py-0.5">
                        Price : {{
                            product.discount > 0 ? (product.price - (product.price * product.discount) / 100).toFixed(2) : product.price
                        }} $
                    </h1>
                    <h1 class="line-through w-fit bg-indigo-900 hover:bg-indigo-400 transition-all transform duration-700 rounded-3xl px-4 py-0.5"
                        v-if="product.discount > 0">
                        Old Price : {{ product.price }} $
                    </h1>
                </div>

                <div class="flex justify-between items-center place-items-end mt-3">
                    <h3 class="leading-6 text-center dark:text-white">
                        <Link :href="route('product.edit', product.slug)" v-text="'Edit'"
                              class="bg-blue-500 hover:bg-blue-700 w-fit text-white px-4 py-0.5 rounded-2xl w-full dark:bg-blue-700 dark:hover:bg-blue-800 transition-all transform duration-700"/>
                    </h3>
                    <h3 class="leading-6 text-center dark:text-white">
                        <Link :href="route('product.destroy', product.slug)" v-text="'Delete'"
                              class="bg-red-500 hover:bg-red-700 w-fit text-white px-4 py-0.5 rounded-2xl w-full dark:bg-red-700 dark:hover:bg-red-800 transition-all transform duration-700"/>
                    </h3>
                </div>
            </div>
        </div>
    </authenticated-layout>
</template>
