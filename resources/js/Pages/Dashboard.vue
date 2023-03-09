<script setup>
import Category from '@/Shared/Category/Category.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import {ref} from "vue";
import {Inertia} from "@inertiajs/inertia";

let props = defineProps({
    filters: Object,
    categories: Array
});

let search = ref(props.filters.search);

let submit = () => (search,function (value) {
    Inertia.get('/',{search: value}, {
        preserveState: true,
        preserveScroll: true,
    });
});
</script>

<template>
    <Head title="eCommerce" />

    <AuthenticatedLayout :categories="categories" :filters.search="search">
        <template #header >
            <div class="lg:grid md:grid grid-cols-3 items-center">
                <h2 class="font-semibold transition-all transform duration-700 text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Home
                </h2>
                <form method="get" action="/" class="col-span-1 flex items-center justify-between">
                    <input class="bg-gray-200 rounded-lg border-2 w-full mr-2 border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-white px-4 py-2" type="text" name="search" placeholder="Search products"
                           v-model="search"
                           autofocus
                           @input="this.$emit('input', $event.target.value)">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">Search</button>
                </form>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" v-for="category in categories">
                <div class="mb-10 items-center px-4 py-8 sm:px-6 bg-gray-200 h-full dark:bg-gray-800 rounded-xl overflow-hidden shadow-2xl" v-if="category.products != 0">
                    <Category :category="category" :filters="filters"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
