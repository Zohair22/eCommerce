<script setup>
import Category from '@/Shared/Category/Category.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import {ref} from "vue";
import {Inertia} from "@inertiajs/inertia";
import Pagination from "@/Pages/Pagination.vue";
import Success from "@/Shared/Product/Success.vue";
import EditCategory from "@/Shared/Category/EditCategory.vue";
import DeleteCategory from "@/Shared/Category/DeleteCategory.vue";

let props = defineProps([
    'categories',
    'filters'
]);

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

    <AuthenticatedLayout :categories="categories.data" :filters="search">
        <template #header >
            <div class="lg:grid md:grid grid-cols-3 items-center">
                <h2
                    class="font-semibold transition-all transform duration-700 text-xl text-gray-800 dark:text-gray-200 leading-tight"
                >
                    {{ filters.search ? filters.search : 'Home' }}
                </h2>

                <!--Search-->
                <form
                    method="get"
                    action="/"
                    class="col-span-1 flex items-center justify-between"
                >
                    <input
                        class="bg-gray-200 rounded-lg border-2 w-full mr-2 border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-white px-4 py-2"
                        type="text"
                        name="search"
                        placeholder="Search products"
                        v-model="search"
                        autofocus
                        @input="this.$emit('input', $event.target.value)"
                    >
                    <button
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg"
                    >
                        Search
                    </button>
                </form>
            </div>
        </template>

        <Pagination :links="categories.links" />

        <div class="mt-0">
            <div
                class="max-w-7xl mx-auto sm:px-6 lg:px-8"
                v-for="category in categories.data"
                :key="category.id"
            >
                <Success :success="$page.props.success" />

                <div
                    class="mb-20 items-center px-4 py-8 sm:px-6 bg-gray-200 h-full dark:bg-gray-800 rounded-xl overflow-hidden shadow-2xl"
                    v-if="!!category.products.length"
                >

                    <div class="flex items-center justify-between" v-if="!!$page.props.auth.user">
                        <EditCategory :slug="category.slug" />
                        <DeleteCategory :slug="category.slug" />
                    </div>

                    <Category
                        :category="category"
                        :filters="filters"
                    />

                </div>
            </div>
            <Pagination :links="categories.links" />
        </div>
    </AuthenticatedLayout>
</template>
