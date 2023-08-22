<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {  useForm } from '@inertiajs/vue3'
import UsersTable from '@/Components/UsersTable.vue'
defineProps({
    users: {
        type: Array,

    }

})

</script>

<template>
    <AppLayout title="Users">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users
            </h2>
        </template>
        <UsersTable :users="users"/>
        

    </AppLayout>
    
    
</template>