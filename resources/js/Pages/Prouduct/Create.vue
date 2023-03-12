<template>
    <authenticated-layout>
        <template #header >
            <div class="lg:grid md:grid grid-cols-3 items-center">
                <h2 class="font-semibold transition-all transform duration-700 text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Create Product
                </h2>
            </div>
        </template>

        <form @submit.prevent="submit"  class="max-w-2xl mx-auto transition-all">

            <div class="mt-16 items-center">
                <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <h2 class="font-semibold text-center transition-all transform duration-700 text-xl text-gray-800 dark:text-gray-200 leading-tight mb-5">
                        Create Product
                    </h2>
                    <div class="flex flex-col">
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-100 text-sm font-bold mb-2" for="name">
                                Product Name
                            </label>
                            <input class="shadow appearance-none border required rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" required placeholder="Category Name" v-model="product.name">
                            <p
                                v-if="$page.props.errors.name"
                                v-text="$page.props.errors.name"
                                class="text-red-500 text-sm mt-1"
                            />
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-100 text-sm font-bold mb-2" for="description">
                                Description
                            </label>
                            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" type="text" required placeholder="Description" v-model="product.description"></textarea>
                            <p
                                v-if="$page.props.errors.description"
                                v-text="$page.props.errors.description"
                                class="text-red-500 text-sm mt-1"
                            />
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-100 text-sm font-bold mb-2" for="price">
                                Price
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="price" type="text" required placeholder="Price" v-model="product.price">
                            <p
                                v-if="$page.props.errors.price"
                                v-text="$page.props.errors.price"
                                class="text-red-500 text-sm mt-1"
                            />
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-100 text-sm font-bold mb-2" for="image">
                                Image
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="image" type="text" required placeholder="Image" v-model="product.image">
                            <p
                                v-if="$page.props.errors.image"
                                v-text="$page.props.errors.image"
                                class="text-red-500 text-sm mt-1"
                            />
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-100 text-sm font-bold mb-2" for="discount">
                                Discount
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="discount" type="text" required placeholder="discount" v-model="product.discount">
                            <p
                                v-if="$page.props.errors.discount"
                                v-text="$page.props.errors.discount"
                                class="text-red-500 text-sm mt-1"
                            />
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-100 text-sm font-bold mb-2" for="stock">
                                Stock
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="stock" type="text" required placeholder="stock" v-model="product.stock">
                            <p
                                v-if="$page.props.errors.stock"
                                v-text="$page.props.errors.stock"
                                class="text-red-500 text-sm mt-1"
                            />
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-100 text-sm font-bold mb-2" for="category_id">
                                Category
                            </label>
                            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="category_id" type="text" required placeholder="Category" v-model="product.category_id">
                                <option value="">Select Category</option>
                                <option v-for="category in $page.props.allCat.categories" :value="category.id">@{{ category.name }}</option>
                            </select>
                            <p
                                v-if="$page.props.errors.category_id"
                                v-text="$page.props.errors.category_id"
                                class="text-red-500 text-sm mt-1"
                            />
                        </div>
                    </div>

                    <input type="hidden" name="user_id" v-model="$page.props.auth.user.id ">
                    <input type="hidden" name="slug" v-model="product.slug">

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
    </authenticated-layout>
</template>

<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {useForm} from "@inertiajs/inertia-vue3";

let product = useForm({
    name: '',
    slug: '',
    description: '',
    price: '',
    image: '',
    discount: 0,
    stock: '',
    category_id: '',
    user_id: '',
});

let submit = () => {
    product.post('/product', { preserveScroll: true, preserveState: true});
}
</script>

<style scoped>

</style>
