<script setup>
import Product from "@/Shared/Product/Product.vue";
defineProps([
    'category',
    'filters',
])
</script>

<template>

    <h1 class="text-center items-center px-6 py-1 rounded-2xl text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-white shadow-3xl font-extrabold transition-all transform duration-700 text-2xl mb-3">
        <Link :href="'?search=' + category.name" v-text=" category.name "/>
    </h1>

    <h1
        class="items-center max-w-5xl mx-auto px-6 py-3 dark:text-gray-400 dark:hover:text-white transition-all transform duration-700 text-lg border-b mb-5 border-gray-500 dark:border-gray-300"
        v-if="filters.search !== null"
        v-text="category.description"
    />

    <div
        class="lg:grid md:grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-4"
    >
        <div
            v-for="(product, index) in category.products"
        >
            <div
                class="col-span-1 bg-gray-100 h-full dark:bg-gray-600 rounded-3xl overflow-hidden shadow-2xl"
                v-if="filters.search !== null"
            >
                <Product
                    :product="product"
                    :filters="filters"
                />
            </div>
            <div
                class="col-span-1 bg-gray-100 h-full dark:bg-gray-600 rounded-3xl overflow-hidden shadow-2xl"
                v-else-if="index < 3"
            >
                <Product
                    :product="product"
                    :filters="filters"
                />
            </div>
        </div>
        <div
            class="lg:col-end-4 md:grid-cols-3 justify-self-end self-end"
            v-if="filters.search === null"
        >
            <Link
                :href="'/?search='+category.name"
                v-text="'More ->'"
                class="text-white bg-blue-600 hover:bg-blue-800 transition-all transform duration-700 px-3 py-0.5 rounded-3xl"
            />
        </div>
    </div>

</template>


