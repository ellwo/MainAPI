<template>


 <div class="px-1 mt-1 ">
            <button v-on:click="pushnew">
                <!-- ad new {{id}} -->
                add new
            </button>
        <!--  here is the chat rooms list items -->



        <template v-for="item in chats" :key="item.id">




<router-link :to="{name:'inbox.showchatroom',params:{chat_room_id:item.id ,type:type,chattings:chattings} }">
<div class="flex p-2 m-2 transition-transform duration-300 transform bg-white rounded shadow-md cursor-pointer dark:bg-primary-dark dark:text-light entry hover:scale-105">
    <div class="flex-2">
        <div class="relative w-12 h-12">
            <img class="w-12 h-12 mx-auto rounded-full bg-primary" :src="item.chatable.avatar" alt="U" />
            <template v-if="chat_room_id==item.id">
           <span class="absolute bottom-0 right-0 w-4 h-4 border-2 border-white rounded-full bg-dark"></span>

            </template>
            <span class="absolute bottom-0 right-0 w-4 h-4 bg-gray-400 border-2 border-white rounded-full"></span>
        </div>
    </div>
    <div class="flex-1 px-2">
        <div class="w-32 truncate"><span class="text-gray-800 dark:text-light">{{item.chatable.name}}</span></div>
        <div class="w-32 truncate"><small class="text-gray-600 dark:text-gray-400">

            {{item.lasttmessage!=null?item.lasttmessage.content:''}}  </small></div>
    </div>
    <div class="text-right flex-2">
        <div><small class="text-gray-500"></small></div>
        <div>
            <template v-if="item.unread_messages_count!=0">
            <small class="inline-block w-6 h-6 text-xs leading-6 text-center text-white bg-red-500 rounded-full">
                {{item.unread_messages_count}}
                </small>
                </template>


            <!-- @if($unreadedcount !=0)

            <small class="inline-block w-6 h-6 text-xs leading-6 text-center text-white bg-red-500 rounded-full">
                {{$unreadedcount}}
            </small>
            @endif -->
        </div>
    </div>
</div>

</router-link>


</template>
</div>


</template>

<script>
import { defineComponent, onMounted,reactive,ref } from 'vue'
import useCompanies from '../../composables/companies';

export default  defineComponent({


    props:{
        userid:{
            type:String,
            required:false

        }
        ,chat_room_id:{
            type:String,
            required:false
            },
            type:{
                type:String,
                required:false
            },
            chattings:{
                type:String,
                required:false
            }

    },

    beforeRouteUpdate(to, from,next){

        console.log("Chat Profile------------------- -  "  )

        console.log("chat room id"+from.params.chat_room_id)
        console.log("Chat Profile------------------- -  "  )
        next();
    },






    setup(props) {

 const { chatrooms, getChatrooms } = useCompanies();

        console.log("on set Up")
        var chats=ref([])
        const data={
            "type":props.type,
            "chatting_id":props.userid

        };






        onMounted(()=>{
        console.log("on Mounted")

        getChatrooms(data).then(()=>{
        chats.value=chatrooms.value

            })
        })





        const pushnew=()=>{
        }











        return{
            chatrooms,
            chats,
            pushnew,
            userid:props.userid,
            chat_room_id:props.chat_room_id,
            chattings:props.chattings,
            type:props.type

        }




    },
})
</script>
