<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
     <div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800" v-if="$page.props.flash.success">
        <div class="flex items-center justify-center w-12 bg-emerald-500">
            <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"/>
            </svg>
        </div>
        
        <div class="px-4 py-2 -mx-3">
            <div class="mx-3">
                <span class="font-semibold text-emerald-500 dark:text-emerald-400">Success</span>
                <p class="text-sm text-gray-600 dark:text-gray-200">{{ $page.props.flash.success }}</p>
            </div>
        </div>
    </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        
                       <button class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80" @click="this.openFormContact = !this.openFormContact">
                        ADD CONTACT
                       </button>
                    </div>
                </div>
            </div>
        </div>
        
   
         
        
    <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800" v-if="openFormContact">
        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white"> Create Account</h2>
        
        <form  @submit.prevent="AddContact()">
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="username">Username</label>
                    <input id="username" type="text" v-model="contact.name" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="emailAddress">Email Address</label>
                    <input id="emailAddress" type="email" v-model="contact.email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="password">TELE</label>
                    <input id="password" type="text" v-model="contact.tel" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>

              
            </div>

            <div class="flex justify-end mt-6">
                <button class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
            </div>
        </form>
    </section>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                       
    <section class="dark:bg-gray-200 bg-white">
        <div class="container px-6 py-8 mx-auto">
            <div class="lg:flex lg:-mx-2">
                
    <SearchContact :contacts="this.contacts"></SearchContact>

                <div class="mt-6 lg:mt-0 lg:px-2 lg:w-4/5 ">
                    <div class="flex items-center justify-between text-sm tracking-widest uppercase ">
                     
                        
        <section class="relative w-full max-w-md px-5 py-4 mx-auto rounded-md">
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                        <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </span>

                <input type="text" class="w-full py-3 pl-10 pr-4 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" placeholder="Search">
            </div>

            
        </section>
                    </div>

                    
                </div>
            </div>
        </div>
    </section>

                    </div>
                        
                    
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
   import SearchContact from "@/Components/SearchContact.vue";

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        SearchContact
    },

    data(){
        return {
            openFormContact : false,
            contact : {
                      name : null,
                      email: null,
                      tel  : null
            }
        }
    },

    props : ['contacts'],

    mounted() {
        console.log(this.contacts);
    },

    methods:{

        AddContact(){
            this.$inertia.post('/add-contact',this.contact);
            this.openFormContact = !this.openFormContact;
        }
    }


};
</script>
