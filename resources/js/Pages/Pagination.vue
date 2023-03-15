<template>
    <div class="" v-if="links.length > 3">
        <div class="flex flex-wrap mt-8">
            <template class="mx-auto" v-for="(link, key) in links" :key="key">
                <div
                    v-if="link.url === null"
                    class="mr-1 mb-1 px-4 text-bold py-3 dark:text-gray-800 dark:bg-gray-500 bg-gray-500 text-sm leading-4 text-gray-400 border rounded"
                    v-html="link.label"
                />

                <Link
                    v-else
                    class="mr-1 mb-1 px-4 text-bold dark:bg-gray-500 py-3 text-sm leading-4 border rounded hover:bg-white dark:hover:text-gray-400  focus:border-primary focus:text-primary"
                    :class="{ 'bg-gray-100 dark:text-gray-400 dark:bg-gray-100': link.active }"
                    :href="link.url"
                    v-html="link.label"
                />
            </template>
        </div>
    </div>
</template>
<script setup>

defineProps({
    links: {
        type: Array,
    },
})
</script>

<style scoped>

</style>
