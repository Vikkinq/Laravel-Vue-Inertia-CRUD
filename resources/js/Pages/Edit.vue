<script setup>
const { user } = defineProps({
    user: Object
})
</script>

<template>
    <div class="p-6">
        <h1>Edit</h1>
        <hr>

        <!-- Now simpler -->
        <h2>{{ user.username }}</h2>

    </div>
</template>