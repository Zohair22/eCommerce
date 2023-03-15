<template>
    <Head title="Update Product" />
    <authenticated-layout>
        <template #header >
            <div class="lg:grid md:grid grid-cols-3 items-center">
                <h2 class="font-semibold transition-all transform duration-700 text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Update Product
                </h2>
            </div>
        </template>

        <form @submit.prevent="submit"  class="max-w-3xl mx-auto transition-all p-10">

            <div class="mt-16 items-center">

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

                <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <h2 class="font-bold text-center transition-all transform duration-700 text-xl text-gray-800 dark:text-gray-200 leading-tight mb-5">
                        Update Product
                    </h2>

                    <div class="flex flex-col">
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-100 text-sm font-bold mb-2" for="name">
                                Product Name
                            </label>
                            <input class="shadow appearance-none border required rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" required placeholder="Category Name" v-model="form.name">
                            <p
                                v-if="$page.props.errors.name"
                                v-for="$error in $page.props.errors.name"
                                v-text="$error"
                                class="text-red-500 text-sm mt-1"
                            />
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-100 text-sm font-bold mb-2" for="description">
                                Description
                            </label>
                            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" type="text" required placeholder="Description" v-model="form.description"></textarea>
                            <p
                                v-if="$page.props.errors.description"
                                v-for="$error in $page.props.errors.description"
                                v-text="$error"
                                class="text-red-500 text-sm mt-1"
                            />
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-100 text-sm font-bold mb-2" for="price">
                                Price by $
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="price" type="text" required placeholder="Price" v-model="form.price">
                            <p
                                v-if="$page.props.errors.price"
                                v-for="$error in $page.props.errors.price"
                                v-text="$error"
                                class="text-red-500 text-sm mt-1"
                            />
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-100 text-sm font-bold mb-2" for="image">
                                Image
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="file"
                                @input="form.image = $event.target.files[0]"
                                id="image"
                                name="image"
                                placeholder="Image"
                                width="300px"
                                height="500px"
                            >
                            <p
                                v-if="$page.props.errors.image"
                                v-for="$error in $page.props.errors.image"
                                v-text="$error"
                                class="text-red-500 text-sm mt-1"
                            />
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-100 text-sm font-bold mb-2" for="discount">
                                Discount %
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="discount" type="text" required placeholder="discount" v-model="form.discount">
                            <p
                                v-if="$page.props.errors.discount"
                                v-for="$error in $page.props.errors.discount"
                                v-text="$error"
                                class="text-red-500 text-sm mt-1"
                            />
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-100 text-sm font-bold mb-2" for="stock">
                                Stock
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="stock" type="text" required placeholder="stock" v-model="form.stock">
                            <p
                                v-if="$page.props.errors.stock"
                                v-for="$error in $page.props.errors.stock"
                                v-text="$error"
                                class="text-red-500 text-sm mt-1"
                            />
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-100 text-sm font-bold mb-2" for="category_id">
                                Category
                            </label>
                            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="category_id" type="text" required placeholder="Category" v-model="form.category_id">
                                <option value="">Select Category</option>
                                <option v-for="category in $page.props.allCats" :value="category.id">@{{ category.name }}</option>
                            </select>
                            <p
                                v-if="$page.props.errors.category_id"
                                v-for="$error in $page.props.errors.category_id"
                                v-text="$error"
                                class="text-red-500 text-sm mt-1"
                            />
                        </div>
                    </div>

                    <input type="hidden" name="user_id" v-model="form.user_id">
                    <input type="hidden" name="slug" v-model="form.slug">
                    <p
                        v-if="$page.props.errors.user_id"
                        v-for="$error in $page.props.errors.user_id"
                        v-text="$error"
                        class="text-red-500 text-sm mt-1"
                    />
                    <p
                        v-if="$page.props.errors.slug"
                        v-for="$error in $page.props.errors.slug"
                        v-text="$error"
                        class="text-red-500 text-sm mt-1"
                    />

                    <div class="flex flex-col">
                        <div class="mb-4">
                            <button class="bg-blue-500 hover:bg-blue-700 justify-self-end text-white font-bold py-1 px-5 transform duration-700 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Update
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
import {watch} from "vue";


let props  = defineProps({
    product: Array,
})

let form = useForm(props.product);

let submit = () => {
    form.post('/product/' + props.product.slug, { preserveScroll: true, preserveState: true});
}
</script>

<style scoped>

</style>
