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

let submit = () => (search, function (value) {
    Inertia.get('/',{search: value}, {
        preserveState: true,
        preserveScroll: true,
    });
});

</script>

<template>
    <Head :title=" filters.search ? filters.search : 'Home'" />

    <AuthenticatedLayout :categories="categories" :filters="search">
        <template #header >
            <div class="lg:grid md:grid grid-cols-3 items-center">
                <h2 class="font-semibold transition-all transform duration-700 text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ filters.search ? filters.search : 'Home' }}
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
                <div
                    v-if="$page.props.success !== null"
                    x-data="{ show:true }"
                    x-init="setTimeout(() => show = false, 2000 )"
                    x-show="show"
                    x-transition.duration.500ms
                    class="max-w-xl mx-auto bg-green-200 text-green-600 text-center border border-2 border-teal-600 font-bold rounded-3xl py-1 mb-2 transition transform duration-700"
                    role="alert"
                >
                    {{ $page.props.success }}
                </div>

                <div class="mb-10 items-center px-4 py-8 sm:px-6 bg-gray-200 h-full dark:bg-gray-800 rounded-xl overflow-hidden shadow-2xl" v-if="category.products">

                    <div class="flex items-center justify-between">
                        <h1 class="px-6 text-green-600 hover:text-green-700 dark:text-green-400 dark:hover:text-green-600 shadow-3xl font-extrabold transition-all transform duration-700 text-lg">
                            <Link :href="route('category.edit', category.name)" v-text="'Edit Category Name'"/>
                        </h1>
                        <h1 class="px-6 text-red-400 hover:text-red-600 dark:text-red-400 dark:hover:text-red-600 shadow-3xl font-extrabold transition-all transform duration-700 text-lg">
                            <Link :href="route('category.destroy', category.name)" methods="DELETE" v-text="'Delete Category'"/>
                        </h1>
                    </div>

                    <Category :category="category" :filters="filters"/>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
