<script setup>
import { ref } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import DialogModal from '@/Components/DialogModal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';


let confirmingUserDeletion = ref(false);
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <SecondaryButton @click.native="confirmingUserDeletion = true">
                        open
                    </SecondaryButton>

                        <DialogModal :show="confirmingUserDeletion" @close="confirmingUserDeletion = false">
                            <template #title>
                                Delete Account
                            </template>

                            <template #content>
                                Are you sure you want to delete your account? Once your account is deleted, all of its
                                resources and data will be permanently deleted. Please enter your password to confirm you
                                would like to permanently delete your account.
                            </template>

                            <template #footer>
                                <DangerButton @click="confirmingUserDeletion = false">
                                    Nevermind
                                </DangerButton>

                                <form >


                                    <DangerButton type="submit" class="ml-2">
                                        Delete Account
                                    </DangerButton>
                                </form>
                            </template>
                        </DialogModal>

                        <!-- <Welcome /> -->
                </div>
            </div>
        </div>
    </AppLayout>
</template>
