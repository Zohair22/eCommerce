<script setup>
import Product from "@/Shared/Product/Product.vue";
defineProps([
    'category',
    'filters',
    'success'
])
</script>

<template>

    <h1 class="text-center items-center px-6 py-1 rounded-2xl text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-white shadow-3xl font-extrabold transition-all transform duration-700 text-2xl mb-3">
        <Link :href="'?search=' + category.name" v-text=" category.name "/>
    </h1>
    <div class="lg:grid md:grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-4">
        <div v-for="(product, index) in category.products" class="sm:mb-4">
            <div class="px-2 col-span-1 py-5 sm:px-6 bg-gray-100 h-full w-full dark:bg-gray-600 rounded-2xl overflow-hidden shadow-2xl" v-if="filters.search !== null">
                <Product :product="product" />
            </div>
            <div class="px-2 col-span-1 py-5 sm:px-6 bg-gray-100 h-full dark:bg-gray-600 rounded-2xl overflow-hidden shadow-2xl" v-else-if="index < 3">
                <Product :product="product" />
            </div>
        </div>
        <div class="lg:col-end-4 md:grid-cols-3 justify-self-end" v-if="filters.search === null">
            <Link :href="'/?search='+category.name" v-text="'More ->'" class="text-white bg-blue-600 hover:bg-blue-800 transition-all transform duration-700 px-3 py-0.5 rounded-3xl" />
        </div>
    </div>

</template>


