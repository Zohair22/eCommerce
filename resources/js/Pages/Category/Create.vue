<template>
    <Head title="Create Category" />

    <AuthenticatedLayout>
        <template #header >
            <div class="lg:grid md:grid grid-cols-3 items-center">
                <h2 class="font-semibold transition-all transform duration-700 text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Create Category
                </h2>
            </div>
        </template>

        <form @submit.prevent="submit"  class="max-w-2xl mx-auto transition-all">

            <div class="mt-16 items-center">
                <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <h2 class="font-semibold text-center transition-all transform duration-700 text-xl text-gray-800 dark:text-gray-200 leading-tight mb-5">
                        Create Category
                    </h2>
                    <div class="flex flex-col">
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-100 text-sm font-bold mb-2" for="name">
                                Category Name
                            </label>
                            <input class="shadow appearance-none border required rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" required placeholder="Category Name" v-model="category.name">
                            <input type="text" hidden v-model="category.slug">
                            <p
                                v-if="$page.props.errors.name"
                                v-text="$page.props.errors.name"
                                class="text-red-500 text-sm mt-1"
                            />
                            <p
                                v-if="$page.props.errors.slug"
                                v-text="$page.props.errors.slug"
                                class="text-red-500 text-sm mt-1"
                            />
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="mb-4">
                            <button class="bg-blue-500 hover:bg-blue-700 justify-self-end text-white font-bold py-1 px-5 transform duration-700 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Create
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {useForm} from "@inertiajs/inertia-vue3";

let category = useForm({
    name: '',
    slug: '',
});

let submit = () => {
    category.post('/category', { preserveScroll: true, preserveState: true});
}
</script>

