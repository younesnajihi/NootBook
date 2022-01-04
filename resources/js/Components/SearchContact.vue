<template>
 <div class="flex flex-col w-64 h-screen px-4 py-8 bg-white border-r dark:bg-gray-800 dark:border-gray-600">
        <h2 class="text-3xl font-semibold text-gray-800 dark:text-white">Contact</h2>

        <div class="relative mt-6">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                    <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </span>

            <input type="text" class="w-full py-3 pl-10 pr-4 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" v-model="this.searchcontact" placeholder="Search"/>
        </div>
        
        <div class="flex flex-col justify-between flex-1 mt-6">
     <nav>
            <div v-for="contact in ContactSearch" v-bind:key="contact.id">

                <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-200 transform rounded-md dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" >
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div v-if="contact.type_contact == 1">
                        <BreezeNavLink :href="route('show_credit',contact.id)"><span class="mx-4 font-medium">{{contact.name}}</span></BreezeNavLink>
                    </div>
                    <div v-else>
                    <BreezeNavLink :href="route('show_othercredit',contact.id)"><span class="mx-4 font-medium">{{contact.name}}</span></BreezeNavLink>
                    </div>               
                </a>

                </div>

                <hr class="my-6 border-gray-200 dark:border-gray-600" />

            </nav>

            
        </div>
    </div>
</template>

<script>
import BreezeNavLink from '@/Components/NavLink.vue'
export default {
    components :{
        BreezeNavLink
    },

    data(){

        return{
            searchcontact :null
        }
    },

    props :['contacts'],

    computed :{
        ContactSearch(){
                if(this.searchcontact){

                 
              return this.contacts.filter(contact => {
              return contact.name.toLowerCase().includes(this.searchcontact.toLowerCase())
              })
                 }else{
                     return this.contacts;
                 }

            }
    }
}
</script>